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
     * @param  array{name: string, email: string, phone: string, title: string, message: string}  $data
     * @param  bool  $forCustomer  Customer confirmation vs owner notification
     */
    public function __construct(
        public array $data,
        public bool $forCustomer = false,
    ) {
    }

    public function envelope(): Envelope
    {
        if ($this->forCustomer) {
            return new Envelope(
                subject: 'We received your quote request: '.$this->data['title'],
            );
        }

        return new Envelope(
            subject: 'New quote request: '.$this->data['title'],
            replyTo: [
                new Address($this->data['email'], $this->data['name']),
            ],
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
