<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK() {

        if (Auth::check()) {
            return redirect()->route('home');
        }

        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::with('vkontakte')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'vk');

            Auth::login($userInSystem);

        }
        return redirect()->route('home');

    }

    public function loginGitHub() {

        if (Auth::check()) {
            return redirect()->route('home');
        }

        return Socialite::driver('github')->redirect();
    }

    public function responseGitHub(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::with('github')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'github');

            Auth::login($userInSystem);

        }
        return redirect()->route('home');

    }

}
