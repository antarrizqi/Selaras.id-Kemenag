<?php

namespace App\Http\Middleware; // HARUS INI

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!auth::check()) {
            return redirect('/login');
        }

        if (auth::user()->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
