<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('pages.admin.users', compact('users'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pages.admin.user', compact('user'));
    }

    public function updateName(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => ['required', 'string'],
        ]);
        $user->update(['name' => $request->name]);
        return back()->with('status', 'username-updated');
    }

    public function updateEmail(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);
        $user->update(['email' => $request->email]);
        return back()->with('status', 'email-updated');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('status', 'password-updated');
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string'],
        ]);
        User::where('id', $request->id)->update(['role' => $request->role]);
        return back();
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Вы не можете удалить самого себя.');
        }
        $user->delete();
        return redirect()->route('users')->with('status', 'Пользователь удален.');
    }
}
