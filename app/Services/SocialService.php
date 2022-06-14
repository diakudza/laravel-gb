<?php

namespace App\Services;

use App\Helpers\LocalEmail;
use App\Repositories\UserRepository;
use App\Services\Contract\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use Laravel\Socialite\Facades\Socialite;

class SocialService implements Social
{
    public function loginViaSocial(string $driver, SocialUser $socialUser): string
    {

        if (Auth::id()) {
            return redirect()->route('home');
        }

        if (LocalEmail::check($socialUser->getEmail())) {
            return redirect()->route('home')->with('alert', 'This e-mail already registred on this site. Please use email/password to singin.');
        }

        $user = Socialite::driver($driver)->user();
        session(['soc.token' => $user->token]);
        $userRepository = new UserRepository;
        $userInSystem = $userRepository->getUserBySocId($user, $driver);
        Auth::login($userInSystem);

        return route('home');

    }
}
