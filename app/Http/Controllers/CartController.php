<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
}
