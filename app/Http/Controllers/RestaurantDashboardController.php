<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;

class RestaurantDashboardController extends Controller
{
    // صفحة لوحة تحكم المطعم
    public function index()
    {
        // تحقق من وجود معرف المطعم في الجلسة
        $restaurantId = session('restaurant_id');
        if (!$restaurantId) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول أولاً');
        }

        return view('restaurant.dashboard');
    }

    // تسجيل خروج المطعم (مسح الجلسة)
    public function logout(Request $request)
    {
        $request->session()->forget('restaurant_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // غيّر حسب صفحة الدخول عندك
    }

    // صفحة تعديل بيانات المطعم
    public function editProfile()
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول أولاً');
        }

        $restaurant = Restaurant::find($restaurantId);

        if (!$restaurant) {
            abort(404, 'المطعم غير موجود');
        }

        return view('restaurant.edit', compact('restaurant'));
    }

    // تحديث بيانات المطعم
    public function updateProfile(Request $request)
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول أولاً');
        }

        $restaurant = Restaurant::find($restaurantId);

        if (!$restaurant) {
            abort(404, 'المطعم غير موجود');
        }

        // تحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => 'required|email|unique:restaurants,email,' . $restaurant->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'diet_id' => 'required|exists:diets,id',
            'username' => 'required|string|unique:restaurants,username,' . $restaurant->id,
            'password' => 'nullable|confirmed|min:6',
            'license_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // تحديث الحقول
        $restaurant->name = $request->name;
        $restaurant->owner_name = $request->owner_name;
        $restaurant->email = $request->email;
        $restaurant->phone = $request->phone;
        $restaurant->address = $request->address;
        $restaurant->diet_id = $request->diet_id;
        $restaurant->username = $request->username;

        if ($request->filled('password')) {
            $restaurant->password = Hash::make($request->password);
        }

        if ($request->hasFile('license_file')) {
            // تخزين الملف الجديد (اختياري: حذف القديم)
            $path = $request->file('license_file')->store('licenses', 'public');
            $restaurant->license_path = $path;
        }

        $restaurant->save();

        return redirect()->route('restaurant.profile.edit')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
