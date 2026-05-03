<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data; // ✅ type hint added

    public function __construct(array $data) // ✅ type hint added
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Contact Message')
            ->view('emails.contact');
    }
}