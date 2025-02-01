<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\RegisterEmailMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('pages.admin.auth.register');
    }

    public function store(UserRequest $request)
    {
        $password = $request->password;
        $data = $request->validated();
        $user = User::create($data);
        Mail::to($user->email)->send(new RegisterEmailMail($user, $password));
        return back()->with('status', 'user-created');
    }
}
