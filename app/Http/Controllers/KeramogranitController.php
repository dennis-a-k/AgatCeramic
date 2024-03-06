<?php

namespace App\Http\Controllers;

class KeramogranitController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Керамогранит']);
    }

    public function show()
    {
        return view('pages.product');
    }
}
