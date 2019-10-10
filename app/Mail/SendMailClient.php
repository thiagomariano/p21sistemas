<?php

namespace AllBlacks\Mail;

use AllBlacks\Models\EmailSent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailClient extends Mailable
{
    use Queueable, SerializesModels;

    private $emailSent;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailSent $emailSent)
    {
        $this->emailSent = $emailSent;
        $this->user = $emailSent->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thiagomarianodamasceno@gmail.com')
                    ->subject($this->emailSent->subject)
                    ->view('emails.send-email-client')
                    ->with([
                        'subject' => $this->emailSent->subject,
                        'description' => $this->emailSent->description,
                    ]);
    }
}
