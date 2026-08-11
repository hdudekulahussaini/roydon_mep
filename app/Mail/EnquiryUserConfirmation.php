<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryUserConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Contacting Roydon MEP',
            from: new Address('no-reply@roydonmep.com', 'Roydon MEP'),
            replyTo: [new Address(config('mail.from.address'), config('mail.from.name'))],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry_user',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
