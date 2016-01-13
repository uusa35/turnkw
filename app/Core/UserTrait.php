<?php

namespace App\Core;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 10/17/15
 * Time: 6:12 PM
 */
trait UserTrait
{
    public function getPageTitle($title)
    {
        $title = Config::get('title.' . $title);

        return Session::put('title', trans($title));
    }


    public function isAdmin()
    {
        if (Cache::has('role.'.Auth::id()) && Cache::get('role.'.Auth::id()) === 'admin') {

            return true;
        }

        return false;
    }

    public function getUserRole()
    {
        return Auth::user()->role;
    }
}