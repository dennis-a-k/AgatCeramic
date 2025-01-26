<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('pages.admin.users', compact('users'));
    }

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

    public function login()
    {
        return view('pages.admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function notice()
    {
        return view('pages.admin.auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('orders.list');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-send');
    }
}
