<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission {
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user || !$user->allPermissions()->pluck('name')->contains($permission)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }

}
