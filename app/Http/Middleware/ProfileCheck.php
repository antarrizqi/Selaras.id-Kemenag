<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCheck
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth::user();

        if (!$user || !$user->profile) {
            return redirect('/profile/create');
        }

        if ($user->profile->status !== 'approved') {
            return redirect('/user');
        }

        return $next($request);
    }
}
