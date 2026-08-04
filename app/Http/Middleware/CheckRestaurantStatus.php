<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class CheckRestaurantStatus
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Check if the restaurant_id session exists
        if (!session()->has('restaurant_id')) {
            return redirect()->route('restaurant.login');
        }

        // 2. Fetch the restaurant from the session ID
        $restaurant = Restaurant::find(session('restaurant_id'));

        // If no restaurant record found, clear session and redirect
        if (!$restaurant) {
            session()->forget('restaurant_id');
            return redirect()->route('restaurant.login');
        }

        // 3. Ensure restaurant is approved (only if the status column exists)
        if (isset($restaurant->status) && $restaurant->status !== 'approved') {
            session()->forget('restaurant_id');
            return redirect()->route('restaurant.login')->withErrors([
                'account' => 'حسابك غير مفعل حالياً، سيتم تفعيله عند الموافقة.'
            ]);
        }

        return $next($request);
    }
}