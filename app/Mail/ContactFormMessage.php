<?php

declare(strict_types=1);

namespace App\Mail;

use App\Dtos\ContactEmailDto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class ContactFormMessage extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(protected ContactEmailDto $contactEmailDto)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.contact',
        );
    }
}
