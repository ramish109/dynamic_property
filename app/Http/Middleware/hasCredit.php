<?php

namespace App\Http\Middleware;

use App\Models\Credit; 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hasCredit
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
        // $user = Auth::user();
        // if(!$user->packageUser->sum('price') > 0 )
        // {
        //     return  abort(403);
        // }else{
        //     return $next($request);
        // }
       // return $next($request);

        $user = Auth::user();
        if($user->type == 'owner' || $user->type == 'admin'){
            return $next($request);
        }
        if(!$user->packageUser->sum('item') > 0 )
        {
            return  abort(403);
        }else{
            return $next($request);
        }

    //   $user = Auth::user();
    //   if($user->type == 'owner'){
    //         return $next($request);
    //   } 
    //   elseif(!$user->packageUser->sum('price') > 0 )
    //   {
    //       return  abort(403);
    //   }else{
    //       return $next($request);
    //   }

    }
}
