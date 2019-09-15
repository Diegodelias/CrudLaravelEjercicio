<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsAdmin
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
        $user=Auth::user(); 
        if (Auth::check()){
            if (!$user->esAdmin())
               return redirect('/');
               
    }
    /*si no es admin redirecciona a la raiz*/
    


        return $next($request);
    }
}
