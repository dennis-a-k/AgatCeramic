<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.orders', compact('orders'));
    }

    public function order(string $order_number)
    {
        $order = Order::where('order_number', $order_number)->firstOrFail();
        return view('pages.admin.order', compact('order'));
    }

    public function print(string $order_number)
    {
        $order = Order::where('order_number', $order_number)->firstOrFail();
        return view('pages.admin.order-print', compact('order'));
    }

    public function success($order_number)
    {
        $successMessage = session('success');

        return view('pages.order-success', compact('order_number', 'successMessage'));
    }
}
