<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteCaptchaTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_quote_page_serves_a_captcha_image(): void
    {
        $page = $this->get(route('quote'));

        $page->assertOk();
        $page->assertSee('Security code', false);
        $page->assertSee('name="form_token"', false);

        $bag = session('quote_form_captcha');
        $this->assertIsArray($bag);
        $this->assertNotEmpty($bag);

        $token = array_key_first($bag);

        $image = $this->get(route('contact.captcha', ['token' => $token]));

        $image->assertOk();
        $image->assertHeader('content-type', 'image/png');
        $this->assertStringStartsWith("\x89PNG", $image->getContent());
    }

    public function test_quote_submission_accepts_the_displayed_code(): void
    {
        Mail::fake();

        $this->get(route('quote'));

        $bag = session('quote_form_captcha');
        $token = array_key_first($bag);
        $code = $bag[$token]['code'];

        $response = $this->from(route('quote'))->post(route('contact.add'), [
            'name' => 'Jane Driver',
            'phone' => '07400000000',
            'captcha' => strtolower($code),
            'form_token' => $token,
            'extra_field' => '',
        ]);

        $response->assertRedirect(route('quote').'#quote');
        $response->assertSessionHas('quote_success');

        Mail::assertSent(QuoteRequestMail::class, function (QuoteRequestMail $mail) {
            return $mail->forCustomer === false
                && $mail->data['name'] === 'Jane Driver'
                && $mail->data['title'] === 'Website enquiry';
        });
        Mail::assertSentCount(1);
    }

    public function test_quote_submission_rejects_a_wrong_code_and_a_filled_honeypot(): void
    {
        Mail::fake();

        $this->get(route('quote'));
        $token = array_key_first(session('quote_form_captcha'));

        $wrong = $this->from(route('quote'))->post(route('contact.add'), [
            'name' => 'Jane Driver',
            'phone' => '07400000000',
            'captcha' => '00000',
            'form_token' => $token,
        ]);

        $wrong->assertSessionHasErrors('captcha');
        Mail::assertNothingSent();

        $this->get(route('quote'));
        $bag = session('quote_form_captcha');
        $token = array_key_first($bag);

        $bot = $this->from(route('quote'))->post(route('contact.add'), [
            'name' => 'Jane Driver',
            'phone' => '07400000000',
            'captcha' => $bag[$token]['code'],
            'form_token' => $token,
            'extra_field' => 'https://spam.example',
        ]);

        $bot->assertSessionHasErrors('captcha');
        Mail::assertNothingSent();
    }
}
