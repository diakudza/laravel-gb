<?php

namespace App\Repositories;

use App\Models\User;
use SocialiteProviders\Manager\OAuth2\User as  UserOAuth;

class UserRepository
{
    public function getUserBySocId(UserOAuth $user, string $socName)
    {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)->where('type_auth', $socName)
            ->orWhere('email', $user->email)
            ->first();

        if(empty($userInSystem)) {
            $userInSystem = new User;
            $userInSystem->fill([
                'name' => $user->getName() ?? '',
                'email' => $user->getEmail() ?? '',
                'password' => '',
                'id_in_soc' => $user->getId() ?? '',
                'type_auth' => $socName,
                'avatar' => $user->getAvatar() ?? '',
            ]);
            $userInSystem->save();
        }

        return $userInSystem;

    }
}
