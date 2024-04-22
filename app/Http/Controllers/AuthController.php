<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful, redirect to intended page or any other logic

            // Store admin name and password in cookies if remember option is selected
            if ($remember) {
                Cookie::queue('admin_email', $request->email, 60 * 24 * 30); // 30 days
                Cookie::queue('admin_password', $request->password, 60 * 24 * 30); // 30 days
            }

            return redirect()->intended('/');
        }

        // Authentication failed, redirect back with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerStore(Request $register)
    {
        $validatedData = $register->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create new user if email is unique
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
    
        Auth::login($user);
    
        return redirect('/login');
    }

    public function logout(Request $request)
{
    Auth::logout();

    // Clear any cookies set for remembering the user
    Cookie::queue(Cookie::forget('admin_email'));
    Cookie::queue(Cookie::forget('admin_password'));

    // Redirect the user to the login page or any other desired page
    return redirect()->route('login');
}

}