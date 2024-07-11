<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }
        Log::info('User Role: ' . $user->role);
        Log::info('Required Roles: ' . implode(', ', $roles));

        if ($user->role && in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403); // Unauthorized
    }
}
