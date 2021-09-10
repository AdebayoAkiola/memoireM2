<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TransporteurMiddleware
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
        $session_value = $request->session()->get('the_user');
            dd($session_value);
        if ($session_value != null ) {
            $value = $session_value[0]->profil;
            if ($value !== "Transporteur") {
                return redirect('sign-in')->with('un_authorize', 'un_authorize');
            }
        }else {
            return redirect('sign-in')->with('un_authorize', 'un_authorize');
        }
        return $next($request);
    }
}
