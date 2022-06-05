<?php

namespace App\Helpers;

use App\Models\User;

/**
 * Class checks if such mail is already registered locally
 * * LocalEmail::check('email')
 *
 */
class LocalEmail
{
    public static function check(string $email)
    { $user = new User();
        return $user->where('email', $email)->where('type_auth', 'site')->first();
    }
}
