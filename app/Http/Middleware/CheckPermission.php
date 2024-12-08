<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission {
    public function handle($request, Closure $next, $permission) {
        $user = Auth::user();

        if (!$user->permissions->pluck('name')->contains($permission) &&
            !$user->roles->flatMap->permissions->pluck('name')->contains($permission)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
