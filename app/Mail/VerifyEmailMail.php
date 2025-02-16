<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Подтверждение адреса электронной почты')
            ->markdown('emails.auth.verify-email', [
                'user' => $this->user,
                'verificationUrl' => $this->user->getVerificationUrl(),
            ]);
    }
}
