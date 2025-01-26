<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('pages.admin.auth.register');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return back()->with('status', 'user-created');
    }

    public function login()
    {
        return view('pages.admin.auth.login');
    }
}
