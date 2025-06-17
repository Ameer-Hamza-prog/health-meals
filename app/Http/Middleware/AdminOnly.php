<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'admin') {  // عدّل حسب هيكل المستخدمين لديك
            abort(403, 'غير مصرح بالدخول.');
        }

        return $next($request);
    }
}
