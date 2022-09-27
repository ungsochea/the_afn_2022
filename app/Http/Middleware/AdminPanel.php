<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminPanel
{
    public function handle(Request $request, Closure $next)
    {
            $user = auth()->user();
            foreach($roles as $role) {
                if($user->hasRole($role))
                    return $next($request);
            }
            return Redirect::route('home');
    }
}
