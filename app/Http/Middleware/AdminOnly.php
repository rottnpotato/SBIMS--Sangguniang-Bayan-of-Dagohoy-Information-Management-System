<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        /*if (auth()->user()->type !== 'Admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }*/
        if (session()->get('user.type') !== 'Admin' && session()->get('user.type') !== 'Secretary') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}