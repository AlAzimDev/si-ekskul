<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRole
{
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return abort(403);
        }else if(Auth::User()->role != $role){
            return abort(403);
        }
        return $next($request);
    }
}
