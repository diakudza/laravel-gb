<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Helpers\LocalEmail;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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
        return redirect()->home()->with(['success'=> 'You are logout!']);;
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
//            if(Auth::user()->role == 1) {
//                return redirect(route('main'));
//            }
            return redirect()->home()->with(['success'=> 'Hello!']);
        }
        return redirect()->back()->with(['alert'=> 'Wrong login or password']);
    }

    public function registrationForm (Request $request)
    {
        return Inertia::render('singup', ['title' => 'Register']);
       // return view('registration',['title' => 'Registration new user']);
    }
    public function registration (RegistrationRequest $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        return redirect()->home()->with('success',  "User $request->name was register!");
    }

}
