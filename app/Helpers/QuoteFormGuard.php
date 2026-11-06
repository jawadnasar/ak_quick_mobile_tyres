<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class QuoteFormGuard
{
    private const SESSION_KEY = 'quote_form_guards';

    private const MIN_SECONDS = 2;

    private const MAX_SECONDS = 10800;

    private const MAX_SENDS_PER_HOUR = 6;

    public static function issue(): array
    {
        $bag = session(self::SESSION_KEY, []);
        $now = time();

        foreach ($bag as $key => $row) {
            if (! is_array($row) || (int) ($row['issued_at'] ?? 0) < $now - self::MAX_SECONDS) {
                unset($bag[$key]);
            }
        }

        $token = bin2hex(random_bytes(16));
        $image = function_exists('imagecreatetruecolor');

        if ($image) {
            $answer = self::randomCode(5);
            $question = null;
        } else {
            $left = random_int(3, 9);
            $right = random_int(2, 8);
            $answer = (string) ($left + $right);
            $question = $left.' + '.$right;
        }

        $bag[$token] = [
            'answer' => $answer,
            'issued_at' => $now,
        ];

        if (count($bag) > 6) {
            $bag = array_slice($bag, -6, null, true);
        }

        session([self::SESSION_KEY => $bag]);

        return [
            'token' => $token,
            'mode' => $image ? 'image' : 'math',
            'question' => $question,
        ];
    }

    public static function imageResponse(string $token): Response
    {
        $row = session(self::SESSION_KEY.'.'.$token);

        if (! is_array($row) || empty($row['answer']) || ! function_exists('imagecreatetruecolor')) {
            abort(404);
        }

        $binary = self::png((string) $row['answer']);

        if ($binary === '') {
            abort(404);
        }

        return response($binary, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
    }

    /**
     * @return array{action: string, message?: string}
     */
    public static function inspect(Request $request): array
    {
        $website = $request->input('extra_field');

        if (is_array($website) || (is_string($website) && trim($website) !== '')) {
            Log::info('Quote form blocked by honeypot.', ['ip' => $request->ip()]);

            return ['action' => 'silent'];
        }

        $token = $request->input('form_token');
        $bag = session(self::SESSION_KEY, []);

        if (! is_string($token) || ! isset($bag[$token]) || ! is_array($bag[$token])) {
            return [
                'action' => 'error',
                'message' => 'Please reload the page and complete the security code.',
            ];
        }

        $row = $bag[$token];
        unset($bag[$token]);
        session([self::SESSION_KEY => $bag]);

        $age = time() - (int) ($row['issued_at'] ?? 0);

        if ($age < self::MIN_SECONDS) {
            return [
                'action' => 'error',
                'message' => 'Please wait a moment and submit the form again.',
            ];
        }

        if ($age > self::MAX_SECONDS) {
            return [
                'action' => 'error',
                'message' => 'This form has expired. Please reload the page and try again.',
            ];
        }

        $given = $request->input('captcha');
        $given = is_string($given) ? strtoupper(preg_replace('/\s+/', '', $given) ?? '') : '';
        $expected = strtoupper((string) ($row['answer'] ?? ''));

        if ($expected === '' || strlen($given) !== strlen($expected) || ! hash_equals($expected, $given)) {
            return [
                'action' => 'error',
                'message' => 'The security code is incorrect. Please try the new code.',
            ];
        }

        return ['action' => 'ok'];
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

    private static function sendKey(Request $request): string
    {
        return 'quote-send:'.sha1((string) $request->ip());
    }

    private static function randomCode(int $length): string
    {
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $max = strlen($alphabet) - 1;
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $alphabet[random_int(0, $max)];
        }

        return $code;
    }

    private static function fontPath(): ?string
    {
        $candidates = [
            'C:\\Windows\\Fonts\\arial.ttf',
            'C:\\Windows\\Fonts\\calibri.ttf',
            '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
            '/usr/share/fonts/truetype/liberation/LiberationSans-Bold.ttf',
            '/usr/share/fonts/dejavu/DejaVuSans-Bold.ttf',
        ];

        foreach ($candidates as $path) {
            if (is_file($path)) {
                return $path;
            }
        }

        return null;
    }

    private static function png(string $code): string
    {
        $width = 180;
        $height = 56;
        $image = imagecreatetruecolor($width, $height);

        if ($image === false) {
            return '';
        }

        $background = imagecolorallocate($image, 243, 246, 249);
        imagefilledrectangle($image, 0, 0, $width, $height, $background);

        for ($i = 0; $i < 8; $i++) {
            $line = imagecolorallocate($image, random_int(180, 210), random_int(190, 220), random_int(200, 230));
            imageline(
                $image,
                random_int(0, $width),
                random_int(0, $height),
                random_int(0, $width),
                random_int(0, $height),
                $line
            );
        }

        $font = self::fontPath();
        $x = 16;

        for ($i = 0, $length = strlen($code); $i < $length; $i++) {
            $color = imagecolorallocate($image, random_int(20, 49), random_int(40, 73), random_int(70, 110));

            if ($font && function_exists('imagettftext')) {
                imagettftext($image, 22, random_int(-8, 8), $x, 40, $color, $font, $code[$i]);
            } else {
                imagestring($image, 5, $x, 18, $code[$i], $color);
            }

            $x += 32;
        }

        ob_start();
        imagepng($image);
        $binary = ob_get_clean();
        imagedestroy($image);

        return is_string($binary) ? $binary : '';
    }
}
