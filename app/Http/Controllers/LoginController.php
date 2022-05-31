<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function form($ability, $arguments = [])
    {
        return view('login', ['title' => 'Login Page']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            if(Auth::user()->role == 1) {
                return redirect(route('main'));
            }
            return redirect()->home()->with('success', 'Hello!');
        }
        return redirect()->back()->with('alert', 'Wrong login or password');
    }

    public function registrationForm (Request $request)
    {
        return view('registration',['title' => 'Registration new user']);
    }
    public function registration (Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->home()->with('success',  "User $request->name was register!");
    }
}
