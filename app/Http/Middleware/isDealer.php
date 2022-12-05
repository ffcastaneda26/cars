<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isDealer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->isDealer()) {
            return $next($request);
        }
        session()->flash('alert',__('You have not Account Dealer access'));
        return redirect()->route('dashboard')->with('error',__('You have not Account Dealer access'));
    }

}
