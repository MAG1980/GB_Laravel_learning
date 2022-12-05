<?php

namespace App\Repositories;

use App\Models\User;
use Laravel\Socialite\Contracts\User as UserOAuth;

class UserRepository
{
    /**Возвращает из БД данные пользователя по id пользователя в соответствующей соцсети
     * @param  UserOAuth  $user
     * @param  string  $socialNetworkName
     * @return void
     */
    public function getUserBySocialNetworkId(UserOAuth $user, string $socialNetworkName)
    {
        $userInDb = User::query()->where('social_network_id', $user->id)->where('type_auth',
            $socialNetworkName)->first();
        if (is_null($userInDb)) {
            $userInDb = new User();
            $userInDb->fill([
                'name' => !empty($user->getName()) ? $user->getName():'',
                'email' => $user->email,
                'password' => '',
                'social_network_id' => !empty($user->getName()) ? $user->getName():'',
                'type_auth' => $socialNetworkName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar():''
            ]);
            $userInDb->save();
        }
        return $userInDb;
    }

}
