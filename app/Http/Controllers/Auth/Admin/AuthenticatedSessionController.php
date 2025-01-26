<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function login()
    {
        return view('pages.admin.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('orders.list')->with('status', 'Добро пожаловать в админ-панель');
        }
        return back()->withErrors([
            'email' => 'Неверный логин или пароль',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
