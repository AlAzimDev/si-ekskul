<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class CheckUserReturnLogin
{
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect('login');
        }else if(Auth::User()->role != $role){
            if($role == 0){
                alert()->warning('Anda harus login sebagai siswa terlebih dahulu!');
            }
            return redirect('home');
        }
        return $next($request);
    }
}
