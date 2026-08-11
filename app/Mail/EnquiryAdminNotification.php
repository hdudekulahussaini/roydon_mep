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

class EnquiryAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Project Enquiry Received',
            from: new Address('no-reply@roydonmep.com', 'Roydon MEP'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry_admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
