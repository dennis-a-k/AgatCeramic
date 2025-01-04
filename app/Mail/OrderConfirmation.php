<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\Order;

class OrderConfirmation extends Mailable
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->markdown('emails.orders.confirmation')
            ->subject('Подтверждение заказа #' . $this->order->order_number);
    }
}
