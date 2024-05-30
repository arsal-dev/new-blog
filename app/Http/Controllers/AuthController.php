<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|required_with:confirm_password',
            'confirm_password' => 'required',
        ]);

        $hashed_password = Hash::make($validated_data['password']);

        User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => $hashed_password,
        ]);

        $check = Auth::attempt([
            'email' => $validated_data['email'],
            'password' => $validated_data['password']
        ]);

        if ($check) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('register');
        }
    }

    public function login_attempt(Request $request)
    {
        $remember = false;

        if (isset($request->remember)) {
            $remember = true;
        }

        $validated_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $validated_data['email'],
            'password' => $validated_data['password']
        ];

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'email or password is wrong!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'logged out!');
    }
}
