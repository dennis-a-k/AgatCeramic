<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnershipConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $call;

    public function __construct($call)
    {
        $this->call = $call;
    }

    public function build()
    {
        return $this->view('emails.partnerships.confirmation')
            ->subject('Подтверждение заявки на сотрудничество с ' . config('app.name'));
    }
}
