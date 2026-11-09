<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: ?string, phone: string, title: string, message: string}  $data
     * @param  bool  $forCustomer  Customer confirmation vs owner notification
     */
    public function __construct(
        public array $data,
        public bool $forCustomer = false,
    ) {
    }

    public function envelope(): Envelope
    {
        $subject = $this->forCustomer
            ? 'We received your quote request: '.$this->data['title']
            : 'New quote request: '.$this->data['title'];

        $replyTo = [];
        $email = $this->data['email'] ?? '';

        if (! $this->forCustomer && is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $replyTo[] = new Address($email, $this->data['name'] ?: 'Customer');
        }

        $replyTo = [];

        if (! empty($this->data['email']) && filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $replyTo[] = new Address($this->data['email'], $this->data['name']);
        }

        return new Envelope(
<<<<<<< HEAD
            subject: $subject,
=======
            subject: 'New quote request: '.$this->data['title'],
>>>>>>> 8de614c607ad1e9cf47b6ecd42cff4f12323859f
            replyTo: $replyTo,
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.quote-request',
            text: 'emails.quote-request-text',
            with: [
                'quote' => $this->data,
                'company' => config('company'),
                'forCustomer' => $this->forCustomer,
            ],
        );
    }
}
