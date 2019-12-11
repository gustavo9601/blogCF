<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;


use Closure;

class Language
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

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

        if($locale != 'en' && $locale != 'es'){
            $locale  = 'en';
        }

        \Session::put('locale',$locale);
        //dd($request->server('HTTP_ACCEPT_LANGUAGE'));

        return $next($request);
    }
}
