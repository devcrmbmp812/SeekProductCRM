<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $surname;
    public $pin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($surname,$pin)
    {
        $this->surname = $surname;
        $this->pin = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Email Verification');
        $this->view('emails.verification');
        
        return $this;
    }
}
