<?php

namespace App\Http\Controllers;

class ZatirkaController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Затирка для плитки']);
    }
}
