<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Profile
{
    public function handle($request, Closure $next)
    {
        $user = auth('api')->user();
        if (isset($user->id) && $user->admin == 1) {
            return $next($request);
        }

        return response()->json('User not allowed', 403);
    }
}
