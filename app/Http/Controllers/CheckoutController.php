<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrderNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $cart = $this->cartService->getCart();
        $total = $this->cartService->getTotal();

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Корзина пуста');
        }

        return view('pages.checkout', compact('cart', 'total'));
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

        $orderDate = Carbon::now('Europe/Moscow');

        $order = Order::create([
            'order_number' => str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT) . '-' . strtoupper(Str::random(10)),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'comment' => $request->comment,
            'total_amount' => $this->cartService->getTotal(),
            'created_at' => $orderDate,
            'updated_at' => $orderDate,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_sku' => $item['sku'],
                'product_title' => $item['title'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'unit' => $item['unit'],
                'subtotal' => $item['price'] * $item['quantity'],
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);
        }

        try {
            // Отправляем письмо клиенту
            if ($order->customer_email) {
                Mail::to($order->customer_email)
                    ->send(new OrderConfirmation($order));
            }

            // Отправляем письмо администратору
            $adminEmail = config('mail.admin_email');
            if ($adminEmail) {
                Mail::to($adminEmail)
                    ->send(new NewOrderNotification($order));
            }
        } catch (\Exception $e) {
            // Логируем ошибку, но позволяем процессу оформления заказа продолжиться
            Log::error('Ошибка отправки email: ' . $e->getMessage());
        }

        $this->cartService->clear();

        return redirect()->route('order.success', ['order_number' => $order->order_number])
            ->with('success', 'Заказ успешно оформлен');
    }
}
