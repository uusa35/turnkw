<?php

namespace App\Core;


use App\Src\User\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 10/15/15
 * Time: 3:30 PM
 */
trait SocialAuthTrait
{

    /*
     * facebook
     *
     * */
    public function redirectToFacebookProvider()
    {

        //return Socialite::driver('facebook')->redirect();
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderFacebookCallback()
    {

        $userSocilite = Socialite::with('facebook')->user();

        $data = [
            'name' => $userSocilite->name,
            'email' => $userSocilite->email,
            'password' => $userSocilite->token,
        ];


        $user = User::where('email', '=', $userSocilite->email)->first();

        if ($user) {

            Auth::login($user);

            return redirect('home')->with(['success', trans('messages.success.login')]);

        } else {

            if ($this->create($data)) {

                $user->roles()->attach(3);

                $user = User::where('email', '=', $userSocilite->email)->first();

                Auth::login($user, true);

                return redirect('home')->with(['success', trans('messages.success.login')]);
            }

            return redirect('home')->with(['error', trans('messages.error.login')]);
        }

    }


    /*
    * github
    *
    * */
    public function redirectToGithubProvider()
    {

        //return Socialite::driver('github')->redirect();
        return Socialite::with('github')->redirect();
    }

    public function handleProviderGithubCallback()
    {

        $userSocilite = Socialite::with('github')->user();

        $data = [
            'name' => $userSocilite->name,
            'email' => $userSocilite->email,
            'password' => $userSocilite->token,
        ];


        $user = User::where('email', '=', $userSocilite->email)->first();

        if ($user) {

            Auth::login($user);

            return redirect('home')->with(['success', trans('messages.success.login')]);

        } else {

            if ($this->create($data)) {

                $user->roles()->attach(3);

                $user = User::where('email', '=', $userSocilite->email)->first();

                Auth::login($user, true);

                return redirect('home')->with(['success', trans('messages.success.login')]);
            }

            return redirect('home')->with(['error', trans('messages.error.login')]);
        }

    }

    /*
    * google
    *
    * */
    public function redirectToGoogleProvider()
    {

        //return Socialite::driver('google')->redirect();
        return Socialite::with('google')->redirect();
    }

    public function handleProviderGoogleCallback()
    {

        $userSocilite = Socialite::with('google')->user();

        $data = [
            'name' => $userSocilite->name,
            'email' => $userSocilite->email,
            'password' => $userSocilite->token,
        ];


        $user = User::where('email', '=', $userSocilite->email)->first();

        if ($user) {

            Auth::login($user);

            return redirect('home')->with(['success', trans('messages.success.login')]);

        } else {

            if ($this->create($data)) {

                $user->roles()->attach(3);

                $user = User::where('email', '=', $userSocilite->email)->first();

                Auth::login($user, true);

                return redirect('home')->with(['success', trans('messages.success.login')]);
            }

            return redirect('home')->with(['error', trans('messages.error.login')]);
        }

    }



    /*
    * twitter
    *
    * */
   /* public function redirectToTwitterProvider()
    {

        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderTwitterCallback()
    {

        $userSocilite = Socialite::with('twitter')->user();

        //working but there is an email address problem with the twitter auth , they do not support email in the incomming array
        var_dump($userSocilite);

        $data = [
            'name' => $userSocilite->name,
            'email' => $userSocilite->email,
            'password' => $userSocilite->token,
        ];


        $user = User::where('email', '=', $userSocilite->email)->first();

        dd($user);

        if ($user) {

            Auth::login($user);

            return redirect('home')->with(['success', trans('messages.success.login')]);

        } else {

            if ($this->create($data)) {

                $user = User::where('email', '=', $userSocilite->email)->first();

                $user->roles()->attach(3);

                Auth::login($user, true);

                return redirect('home')->with(['success', trans('messages.success.login')]);
            }

            return redirect('home')->with(['error', trans('messages.error.login')]);
        }

    }*/



}