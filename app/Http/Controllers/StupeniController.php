<?php

namespace App\Http\Controllers;

class StupeniController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Ступени']);
    }
}
