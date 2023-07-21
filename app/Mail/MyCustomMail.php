<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyCustomMail extends Mailable
{
    use SerializesModels;

    public $name;
    public $phone;
    public $subject;
    public $message;

    public function __construct($name, $phone, $subject, $message)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.my_custom_mail')
                    ->subject($this->subject);
    }
}

