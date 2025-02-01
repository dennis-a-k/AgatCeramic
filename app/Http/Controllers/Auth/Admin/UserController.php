<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('pages.admin.users', compact('users'));
    }

    public function edit(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('pages.admin.user', compact('user'));
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
        User::where('id', $request->id)->update(['name' => $request->name]);
        return back()->with('status', 'username-updated');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
        ]);
        User::where('id', $request->id)->update(['email' => $request->email]);
        return back()->with('status', 'email-updated');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);
        User::where('id', $request->id)->update(['password' => Hash::make($request->password)]);
        return back()->with('status', 'password-updated');
    }

    // public function destroy(Request $request)
    // {
    //     $product = Product::find($request->id)->get();
    //     foreach ($product->images as $image) {
    //         Storage::delete('public/images/' . $image->title);
    //     }
    //     $product->delete();
    //     return back();
    // }
}
