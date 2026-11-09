<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class QuoteFormSecurityTest extends TestCase
{
    public function test_public_quote_forms_include_the_security_code(): void
    {
        foreach (['home', 'contact', 'quote'] as $name) {
            $this->get(route($name))
                ->assertOk()
                ->assertSee('name="form_token"', false)
                ->assertSee('name="captcha"', false)
                ->assertSee('name="extra_field"', false)
                ->assertSee('Security code');
        }
    }

    public function test_direct_post_does_not_send_mail(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->post(route('contact.add'), $this->payload())
            ->assertSessionHasErrors('captcha');

        Mail::assertNothingSent();
    }

    public function test_honeypot_does_not_send_mail(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->post(route('contact.add'), $this->payload([
                'extra_field' => 'https://spam.test',
                'form_token' => 'not-a-real-token',
                'captcha' => 'ABCDE',
            ]))
            ->assertSessionHas('quote_success');

        Mail::assertNothingSent();
    }

    public function test_wrong_security_code_does_not_send_mail(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->withSession([
                'quote_form_guards' => [
                    'token123token123token123token123' => [
                        'answer' => 'AB12C',
                        'issued_at' => time() - 30,
                    ],
                ],
            ])
            ->post(route('contact.add'), $this->payload([
                'form_token' => 'token123token123token123token123',
                'captcha' => 'WRONG',
            ]))
            ->assertSessionHasErrors('captcha');

        Mail::assertNothingSent();
    }

    public function test_link_in_the_message_does_not_send_mail(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->withSession([
                'quote_form_guards' => [
                    'token123token123token123token123' => [
                        'answer' => 'AB12C',
                        'issued_at' => time() - 30,
                    ],
                ],
            ])
            ->post(route('contact.add'), $this->payload([
                'form_token' => 'token123token123token123token123',
                'captcha' => 'ab12c',
                'message' => 'Visit https://spam.test for a deal',
            ]))
            ->assertSessionHas('quote_error');

        Mail::assertNothingSent();
    }

    public function test_valid_security_code_sends_the_quote_emails(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->withSession([
                'quote_form_guards' => [
                    'token123token123token123token123' => [
                        'answer' => 'AB12C',
                        'issued_at' => time() - 30,
                    ],
                ],
            ])
            ->post(route('contact.add'), $this->payload([
                'form_token' => 'token123token123token123token123',
                'captcha' => 'ab12c',
            ]))
            ->assertSessionHas('quote_success');

        Mail::assertSent(QuoteRequestMail::class, 2);
    }

    public function test_name_and_phone_only_sends_one_email_to_the_business(): void
    {
        Mail::fake();

        $this->from(route('contact'))
            ->withSession([
                'quote_form_guards' => [
                    'token123token123token123token123' => [
                        'answer' => 'AB12C',
                        'issued_at' => time() - 30,
                    ],
                ],
            ])
            ->post(route('contact.add'), $this->payload([
                'form_token' => 'token123token123token123token123',
                'captcha' => 'AB12C',
                'email' => '',
                'title' => '',
                'message' => '',
            ]))
            ->assertSessionHas('quote_success');

        Mail::assertSent(QuoteRequestMail::class, 1);
    }

    public function test_send_limit_blocks_further_emails(): void
    {
        Mail::fake();

        $key = 'quote-send:'.sha1('127.0.0.1');
        for ($i = 0; $i < 6; $i++) {
            RateLimiter::hit($key, 3600);
        }

        $this->from(route('contact'))
            ->withSession([
                'quote_form_guards' => [
                    'token123token123token123token123' => [
                        'answer' => 'AB12C',
                        'issued_at' => time() - 30,
                    ],
                ],
            ])
            ->post(route('contact.add'), $this->payload([
                'form_token' => 'token123token123token123token123',
                'captcha' => 'AB12C',
            ]))
            ->assertSessionHasErrors('captcha');

        Mail::assertNothingSent();
    }

    public function test_captcha_image_is_a_png_for_the_current_form(): void
    {
        if (! function_exists('imagecreatetruecolor')) {
            $this->markTestSkipped('GD is not available.');
        }

        $page = $this->get(route('contact'));
        $page->assertOk();

        preg_match('/contact\/captcha\/([a-f0-9]{32})/', $page->getContent(), $matches);
        $this->assertNotEmpty($matches[1] ?? null);

        $this->get(route('contact.captcha', ['token' => $matches[1]]))
            ->assertOk()
            ->assertHeader('content-type', 'image/png');
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jane Driver',
            'email' => 'jane@example.com',
            'phone' => '07405726167',
            'title' => 'Puncture repair',
            'message' => 'Need a tyre fitted at home tonight.',
            'extra_field' => '',
        ], $overrides);
    }
}
