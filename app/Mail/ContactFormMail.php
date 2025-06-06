<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Data dari form kontak.
     * @var array
     */
    public $data;

    /**
     * Buat instance pesan baru.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Dapatkan amplop pesan.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: config('mail.from.address'), // Email pengirim (dari .env)
            replyTo: $this->data['email'],      // Reply-To ke email pengisi form
            subject: 'Pesan Baru dari Form Kontak: ' . $this->data['subject'],
        );
    }

    /**
     * Dapatkan definisi konten pesan.
     */
    public function content(): Content
    {
        // Menunjuk ke file view Blade yang akan menjadi body email
        return new Content(
            view: 'emails.contact-form',
        );
    }

    /**
     * Dapatkan lampiran untuk pesan.
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}