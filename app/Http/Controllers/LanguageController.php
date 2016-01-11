<?php namespace App\Http\Controllers;

use App\Core\PrimaryController;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class LanguageController extends PrimaryController
{

    public function changeLocale($lang)
    {


        Session::set('locale', $lang);


        return redirect()->back();
    }

}
