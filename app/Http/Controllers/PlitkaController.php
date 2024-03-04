<?php

namespace App\Http\Controllers;

class PlitkaController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Плитка']);
    }
}
