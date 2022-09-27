<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()) return redirect(url('/'));
        $user = Auth::user();
        if($user->isUser()){
            return $next($request);
        }
        return redirect(url('/'));
    }
}
