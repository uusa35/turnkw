<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {

            if ($request->ajax()) {

                return response('Unauthorized.', 401);

            } else {

                return redirect()->guest('login');
            }
        }

        if (!Cache::has('role')) {

            Cache::rememberForever('role', function () {

                return Auth::user()->role;

            });

        }

        return $next($request);
    }
}
