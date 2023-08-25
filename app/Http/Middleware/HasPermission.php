<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Auth;

class HasPermission
{

    public function handle($request, Closure $next)
    {
        //dd($request);
        $user = Auth::user();
        $controllerAction = class_basename(Route::currentRouteAction());
        //dd($user->can($controllerAction));
        if($user->can($controllerAction)){
            return $next($request);
        }
        else {
            return redirect()->back()->with('flash_warning', 'you are not allowed for requesting page');
        }

    }
}
