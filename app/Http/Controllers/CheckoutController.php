<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'shipping_address' => 'required',
        ]);

        $cart = $this->cartService->getCart();

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Корзина пуста');
        }

        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'comment' => $request->comment,
            'total_amount' => $this->cartService->getTotal()
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_title' => $item['title'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        // Отправляем письмо клиенту
        Mail::to($order->customer_email)
            ->send(new OrderConfirmation($order));

        // Отправляем письмо администратору
        Mail::to(config('mail.admin_email'))
            ->send(new NewOrderNotification($order));

        $this->cartService->clear();

        return redirect()->route('order.success', $order->order_number)
            ->with('success', 'Заказ успешно оформлен');
    }
}