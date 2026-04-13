<?php

namespace App\Http\Middleware; // HARUS INI

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = request()->user();

        if (!$user) {
            return redirect('/login');
        }

        if ($user->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
