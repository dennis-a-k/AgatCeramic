<?php

namespace App\Http\Controllers;

class SantekhnikaController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Сантехника']);
    }
}
