<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRestaurantStatus
{
    public function handle(Request $req, Closure $next)
    {
        $user = Auth::user();

        if ($user->role === 'restaurant' && $user->restaurant->status !== 'approved') {
            Auth::logout();
            return redirect()->route('restaurant.login')->withErrors([
                'account' => 'حسابك غير مفعل حالياً، سيتم تفعيله عند الموافقة.'
            ]);
        }

        return $next($req);
    }
}
