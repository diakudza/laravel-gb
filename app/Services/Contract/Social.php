<?php

namespace App\Services\Contract;

use App\Repositories\UserRepository;
use Laravel\Socialite\Contracts\User;

interface Social
{
    public function loginViaSocial(string $driver, User $socialUser): string;
}
