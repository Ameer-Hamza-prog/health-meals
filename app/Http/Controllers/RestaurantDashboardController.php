<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RestaurantDashboardController extends Controller
{
    public function index()
    {
        $restaurantId = session('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);
        
        if (!$restaurant) {
            return redirect()->route('restaurant.login')->with('error', 'يرجى تسجيل الدخول أولاً');
        }
        
        return view('restaurant.dashboard', compact('restaurant'));
    }
    
    public function editProfile()
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId) {
            return redirect()->route('restaurant.login')->with('error', 'يرجى تسجيل الدخول أولاً');
        }

        $restaurant = Restaurant::find($restaurantId);

        if (!$restaurant) {
            abort(404, 'المطعم غير موجود');
        }

        return view('restaurant.profile.edit', compact('restaurant'));
    }
    
    public function updateProfile(Request $request)
    {
        $restaurantId = session('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);
        
        if (!$restaurant) {
            return redirect()->route('restaurant.dashboard')->with('error', 'Restaurant not found');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:restaurants,email,' . $restaurant->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        
        $restaurant->update($validated);
        
        return redirect()->route('restaurant.profile.edit')->with('success', 'تم تحديث البيانات بنجاح');
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('restaurant_id');
        return redirect()->route('restaurant.login');
    }
}
