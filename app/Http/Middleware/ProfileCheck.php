<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileCheck
{
    public function handle(Request $request, Closure $next)
{
    $user = auth::user();

    //  kalau belum login atau belum punya profile
    if (!$user || !$user->profile) {
        return redirect()->route('profile.create');
    }

    //  kalau belum di-approve
    if ($user->profile->status !== 'approved') {
        return redirect('/user');
    }

    return $next($request);
}
}
