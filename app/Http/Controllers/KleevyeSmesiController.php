<?php

namespace App\Http\Controllers;

class KleevyeSmesiController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Клеевые смеси']);
    }
}
