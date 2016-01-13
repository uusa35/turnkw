<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Session::has('locale')) {

            Session::put('locale', 'en');
            /* Special Session to change direction of classes */
            Session::put(['pullClass' => 'pull-right', 'pullClassReverse' => 'pull-left']);

        } else {
            /* Special Session to change direction of classes */

            /*$this->pullClass(Session::get('locale'));*/

            app()->setLocale(Session::get('locale'));

            //Config::set('app.locale', Session::get('locale'));

        }

        return $next($request);
    }

    public function pullClass($lang)
    {

        if ($lang == 'ar') {


            return Session::put(['pullClass' => 'pull-left', 'pullClassReverse' => 'pull-right']);

        }

        return Session::put(['pullClass' => 'pull-left', 'pullClassReverse' => 'pull-right']);

    }
}
