<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {


        /*$newDoc = new \App\Core\CreateDocument();
        $newDoc->createDoc();*/

        /*$newSheet = new \App\Core\CreateExcelSheet();
        $newSheet->createSheet();*/


        if (Auth::user()) {

            return view('backend.home');

        }

        return view('auth.login');
    }

    public function testExcel() {
        return Response::make();
    }
}
