<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'|| Auth::user()->user_type == 'affiliate'|| Auth::user()->user_type == 'trading'|| Auth::user()->user_type == 'agent')) {
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
