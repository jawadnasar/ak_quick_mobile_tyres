<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class QuoteFormGuard
{
    private const SESSION_KEY = 'quote_form_captcha';

    private const TTL_SECONDS = 1200;

    private const CODE_LENGTH = 5;

    private const MAX_SENDS_PER_HOUR = 6;

    /**
     * Characters that stay readable in the image. Ambiguous pairs (0/O, 1/I/L) are left out.
     */
    private const ALPHABET = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789';

    public static function issue(): string
    {
        $token = bin2hex(random_bytes(16));
        $bag = self::prune(session()->get(self::SESSION_KEY, []));

        $bag[$token] = [
            'code' => self::makeCode(),
            'expires' => time() + self::TTL_SECONDS,
        ];

        if (count($bag) > 8) {
            $bag = array_slice($bag, -8, null, true);
        }

        session()->put(self::SESSION_KEY, $bag);

        return $token;
    }

    public static function exists(string $token): bool
    {
        return self::find($token) !== null;
    }

    public static function image(string $token): Response
    {
        $row = self::find($token);

        if ($row === null) {
            abort(404);
        }

        $png = self::render($row['code']);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'private, no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
    }

    /**
     * Returns an error message when the submission should be rejected.
     * A matching code is removed so it cannot be reused.
     */
    public static function verify(Request $request): ?string
    {
        $extra = $request->input('extra_field');

        if (is_array($extra) || (is_string($extra) && trim($extra) !== '')) {
            Log::info('Quote form blocked by honeypot.', ['ip' => $request->ip()]);

            return 'Unable to send your request right now. Please call us instead.';
        }

        $token = (string) $request->input('form_token', '');
        $given = strtoupper((string) preg_replace('/[^A-Za-z0-9]/', '', (string) $request->input('captcha', '')));
        $row = self::find($token);

        self::forget($token);

        if ($given === '') {
            return 'Please enter the security code.';
        }

        if ($row === null) {
            return 'That security code has expired. Enter the new code shown above.';
        }

        $expected = $row['code'];

        if (strlen($given) !== strlen($expected) || ! hash_equals($expected, $given)) {
            return 'The security code does not match. Enter the new code shown above.';
        }

        return null;
    }

    public static function spamReason(array $data): ?string
    {
        $name = (string) ($data['name'] ?? '');
        $email = (string) ($data['email'] ?? '');
        $phone = (string) ($data['phone'] ?? '');
        $title = (string) ($data['title'] ?? '');
        $message = (string) ($data['message'] ?? '');

        foreach ([$name, $email, $phone, $title] as $field) {
            if (preg_match("/[\r\n]/", $field)) {
                return 'We could not accept that message. Please call us instead.';
            }
        }

        $blob = $name."\n".$email."\n".$phone."\n".$title."\n".$message;

        if (preg_match('/https?:\/\/|www\.|\[url|<\s*a\s/i', $blob)) {
            Log::info('Quote form blocked because it contained a link.', ['ip' => request()->ip()]);

            return 'Please remove any website links from the form, or call us.';
        }

        if (preg_match('/\b(viagra|cialis|casino|lottery|bitcoin|cryptocurrency|forex|seo\s+service|backlink|crypto)\b/i', $blob)) {
            Log::info('Quote form blocked as spam content.', ['ip' => request()->ip()]);

            return 'We could not accept that message. Please call us instead.';
        }

        $sample = $title.' '.$message;
        $letters = (int) preg_match_all('/\p{L}/u', $sample);
        $foreign = (int) preg_match_all('/\p{Cyrillic}|\p{Han}|\p{Hiragana}|\p{Katakana}/u', $sample);

        if ($letters >= 12 && ($foreign / $letters) > 0.5) {
            Log::info('Quote form blocked as unreadable spam.', ['ip' => request()->ip()]);

            return 'We could not accept that message. Please call us instead.';
        }

        return null;
    }

    public static function tooManySends(Request $request): bool
    {
        return RateLimiter::tooManyAttempts(self::sendKey($request), self::MAX_SENDS_PER_HOUR);
    }

    public static function markSent(Request $request): void
    {
        RateLimiter::hit(self::sendKey($request), 3600);
    }

    /**
     * @return array{code: string, expires: int}|null
     */
    private static function find(string $token): ?array
    {
        if ($token === '') {
            return null;
        }

        $bag = self::prune(session()->get(self::SESSION_KEY, []));
        session()->put(self::SESSION_KEY, $bag);

        $row = $bag[$token] ?? null;

        if (! is_array($row) || empty($row['code'])) {
            return null;
        }

        return [
            'code' => strtoupper((string) $row['code']),
            'expires' => (int) ($row['expires'] ?? 0),
        ];
    }

    private static function forget(string $token): void
    {
        $bag = session()->get(self::SESSION_KEY, []);

        if (! is_array($bag) || ! array_key_exists($token, $bag)) {
            return;
        }

        unset($bag[$token]);
        session()->put(self::SESSION_KEY, $bag);
    }

    /**
     * @param  mixed  $bag
     * @return array<string, array{code: string, expires: int}>
     */
    private static function prune(mixed $bag): array
    {
        if (! is_array($bag)) {
            return [];
        }

        $now = time();
        $kept = [];

        foreach ($bag as $token => $row) {
            if (! is_string($token) || ! is_array($row)) {
                continue;
            }

            if (($row['expires'] ?? 0) < $now || empty($row['code'])) {
                continue;
            }

            $kept[$token] = [
                'code' => strtoupper((string) $row['code']),
                'expires' => (int) $row['expires'],
            ];
        }

        return $kept;
    }

    private static function makeCode(): string
    {
        $alphabet = self::ALPHABET;
        $max = strlen($alphabet) - 1;
        $code = '';

        for ($i = 0; $i < self::CODE_LENGTH; $i++) {
            $code .= $alphabet[random_int(0, $max)];
        }

        return $code;
    }

    private static function sendKey(Request $request): string
    {
        return 'quote-send:'.sha1((string) $request->ip());
    }

    /**
     * Draw the code with GD's built-in font.
     *
     * The host blocks paths outside the site (open_basedir), so probing
     * system fonts such as DejaVu under /usr/share/fonts crashes the request.
     */
    private static function render(string $code): string
    {
        if (! function_exists('imagecreatetruecolor') || ! function_exists('imagepng')) {
            throw new \RuntimeException('GD is required to draw the security code.');
        }

        $width = 180;
        $height = 56;
        $image = imagecreatetruecolor($width, $height);

        $background = imagecolorallocate($image, 243, 246, 249);
        imagefilledrectangle($image, 0, 0, $width, $height, $background);

        for ($i = 0; $i < 7; $i++) {
            $line = imagecolorallocate($image, random_int(186, 214), random_int(194, 220), random_int(202, 226));
            imageline(
                $image,
                random_int(0, $width),
                random_int(0, $height),
                random_int(0, $width),
                random_int(0, $height),
                $line
            );
        }

        $palette = [
            [49, 73, 104],
            [20, 24, 32],
            [140, 42, 42],
        ];

        $font = 5;
        $glyphWidth = imagefontwidth($font);
        $glyphHeight = imagefontheight($font);
        $scale = 2;
        $length = strlen($code);
        $step = (int) floor(($width - 20) / max($length, 1));

        for ($i = 0; $i < $length; $i++) {
            $glyph = imagecreatetruecolor($glyphWidth, $glyphHeight);
            $glyphBackground = imagecolorallocate($glyph, 243, 246, 249);
            $rgb = $palette[$i % count($palette)];
            $glyphColor = imagecolorallocate($glyph, $rgb[0], $rgb[1], $rgb[2]);
            imagefilledrectangle($glyph, 0, 0, $glyphWidth, $glyphHeight, $glyphBackground);
            imagestring($glyph, $font, 0, 0, $code[$i], $glyphColor);

            $drawWidth = $glyphWidth * $scale;
            $drawHeight = $glyphHeight * $scale;
            $x = 10 + ($i * $step);
            $y = (int) (($height - $drawHeight) / 2) + random_int(-2, 2);

            imagecopyresized($image, $glyph, $x, $y, 0, 0, $drawWidth, $drawHeight, $glyphWidth, $glyphHeight);
            imagedestroy($glyph);
        }

        ob_start();
        imagepng($image);
        $binary = ob_get_clean();
        imagedestroy($image);

        if (! is_string($binary) || $binary === '') {
            throw new \RuntimeException('The security code image could not be created.');
        }

        return $binary;
    }
}
