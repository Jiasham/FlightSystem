<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');  // Pointing to your register.blade.php
    }

    public function register(Request $request)
    {
        // ✅ Validate inputs
        $request->validate([
            'username' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // ✅ Save to database with hashed password
        User::create([
            'username' => $request->input('username'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'created_at' => now(),
        ]);

        // ✅ Redirect to login page with success message
        return redirect()->route('custom.login.form')->with('success', 'Registration successful! Please login.');
  }
}
