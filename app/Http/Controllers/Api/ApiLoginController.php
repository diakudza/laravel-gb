<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            $profile = User::where('email', $request->email)->first();
            return ['login' => 'true',
                'profile' => $profile,
                'token' => $profile->createToken($request->email)->plainTextToken,
            ];
        }
        return ['login'=>'false'];

    }

    public function me (User $user, Request $request) {
    $userToken = $request->bearerToken();
        return ['login' => 'true',
            'profile' => auth()->user()
        ];
    }
    public function logout()
    {
//        User::tokens()->delete();
        Auth::logout();
        return (['login'=>'false']);
    }

}
