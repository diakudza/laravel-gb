<?php

namespace App\Http\Controllers;

use App\Services\Contract\Social;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

   public function redirect(string $driver)
    {
       return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        return redirect(
            $social->loginViaSocial($driver, Socialite::driver(($driver))->user())
        );
    }
}
