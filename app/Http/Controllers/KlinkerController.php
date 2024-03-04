<?php

namespace App\Http\Controllers;

class KlinkerController extends Controller
{
    public function index()
    {
        return view('pages.goods', ['title' => 'Клинкерная плитка']);
    }
}
