<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\Order;

class NewOrderNotification extends Mailable
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->markdown('emails.orders.new_order')
            ->subject('Новый заказ #' . $this->order->order_number);
    }
}
