<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    /**Перенаправление пользователя к провайдеру OAuth
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function socialNetworkLogin($authorizationProvider)
    {dump($authorizationProvider);
        return Socialite::driver($authorizationProvider)->redirect();
    }

    /**Проверяет входящий запрос и получает информацию о пользователе от провайдера после того, как он одобрил запрос аутентификации.
     * @return void
     */
    public function socialNetworkResponse($authorizationProvider, UserRepository $userRepository ){

        $user = Socialite::driver($authorizationProvider)->user();

        //Пользователь, полученный из БД сразу, или после добавления в БД на основании данных соцсети.
        $userInDb=$userRepository->getUserBySocialNetworkId($user,$authorizationProvider);
        Auth::login($userInDb);
        return redirect()->route('home');
    }
}
