<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function changePassword()
    {
        return view('users/change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function changeUsername()
    {
        return view('users/change-username');
    }

    public function updateUsername(Request $request)
    {
        # Validation
        $request->validate([
            'old_username' => 'required',
            'new_username' => 'required|confirmed',
        ]);

        #Match The Old username
        if (!$request->old_username == auth()->user()->username) {
            return back()->with("error", "Old Username Doesn't match!");
        }

        #Update the new username
        User::whereId(auth()->user()->id)->update([
            'username' => $request->new_username,
        ]);

        return back()->with("status", "Username changed successfully!");
    }

    public function changeEmail()
    {
        return view('users/change-email');
    }

    public function updateEmail(Request $request)
    {
        # Validation
        $request->validate([
            'old_email' => 'required',
            'new_email' => 'required|confirmed',
        ]);

        #Match The Old email
        if (!$request->old_email == auth()->user()->email) {
            return back()->with("error", "Old Email Doesn't match!");
        }

        #Update the new username
        User::whereId(auth()->user()->id)->update([
            'email' => $request->new_email,
        ]);

        return back()->with("status", "Email changed successfully!");
    }

}
