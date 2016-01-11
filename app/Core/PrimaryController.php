<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 8/31/15
 * Time: 10:40 AM
 */

namespace App\Core;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PrimaryController extends Controller
{

    public $requestedRoute;
    public $titles;

    use UserTrait;

}