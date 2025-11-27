<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->type !== $type) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
