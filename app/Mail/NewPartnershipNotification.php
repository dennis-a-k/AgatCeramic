<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPartnershipNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $call;

    public function __construct($call)
    {
        $this->call = $call;
    }

    public function build()
    {
        return $this->view('emails.orders.new_call')
            ->subject('Новая заявка на звонок ' . $this->call->name . ' ' . $this->call->phone);
    }
}
