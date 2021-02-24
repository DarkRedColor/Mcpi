<?php

namespace App\Http\Middleware;


use Closure;
//use Composer\Config;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $value = $request->segment(1);
        if($value!='ro'){
            $value='en';
        }
        App::setLocale($value);

//        dd(\Config::get('app.locale'));
//        if (!Session::has('locale')) {
//            Session::put('locale', Config::get('app.locale'));
//        }
//        App::setLocale(session('locale'));
        return $next($request);
    }
}
