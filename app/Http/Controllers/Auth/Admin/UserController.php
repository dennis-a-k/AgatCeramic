<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('pages.admin.auth.register');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function login()
    {
        return view('pages.admin.auth.login');
    }
}
