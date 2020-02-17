<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRole
{
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return abort(404);
        }else if(Auth::User()->role != $role){
            return abort(404);
        }
        return $next($request);
    }
}
