<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('pages.admin.auth.register');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        event(new Registered($user));
        Auth::login($user);
        return back()->with('status', 'user-created');
    }
}
