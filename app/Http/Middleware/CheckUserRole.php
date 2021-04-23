<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRole
{
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect('login');
        }else if(Auth::User()->role != $role){
            return redirect('login');
        }
        return $next($request);
    }
}
