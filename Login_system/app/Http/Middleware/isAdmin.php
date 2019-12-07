<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        $user = Auth::user();

        // echo $user->role->name;
        // die();

        if($user->role->name == 'admin'){
            // return redirect()->intended('/admin');
            return $next($request);
        }

        return redirect('/');
        
    }
}
