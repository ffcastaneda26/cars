<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('locale')){
            App::setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}
