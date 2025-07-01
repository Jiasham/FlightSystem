<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

public function register(Request $request)
{
    // Validate input
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:user,email',
        'phoneNumber' => 'required|string|max:20',
        'password' => 'required|string|min:6',
    ]);

    try {
        // Save new user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);

        // Redirect to login page with success
        return redirect()->route('custom.login.form')->with('success', 'Account created successfully! Please login.');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to create account. Error: ' . $e->getMessage());
    }
}



public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        // Redirect to homepage after login
        return redirect('/');
    }

    return back()->with('error', 'Invalid email or password.');
}


    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('custom.login.form');
        }

        return view('dashboard', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('custom.login.form');
    }
}
