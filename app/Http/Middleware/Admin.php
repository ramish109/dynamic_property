<?php

namespace App\Http\Middleware; 

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user->type == 'admin')
        {
            return $next($request);
        }else{
            return  abort(403);

        }
        //return $next($request);
    }
}
