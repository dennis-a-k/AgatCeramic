<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success($order_number)
    {
        $successMessage = session('success');

        return view('pages.order-success', compact('order_number', 'successMessage'));
    }
}
