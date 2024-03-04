<?php

namespace App\Http\Controllers;

class MozaikaController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Мозаика']);
    }
}
