<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkUserArtikel
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
        $id = substr($request->url(), -1);
        if(Auth::user()->id == $id){
                return $next($request);
        }else{
            return redirect(route('home'))->with('no','ga boleh ya');
        }
    }
}
