<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantDashboardController extends Controller
{
    public function index()
    {
        return view('restaurant.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function editProfile()
    {
        $restaurant = Restaurant::find(Auth::id());

        if (!$restaurant) {
            abort(404, 'المطعم غير موجود');
        }

        return view('restaurant.edit', compact('restaurant'));
    }

    public function updateProfile(Request $request)
    {
        $restaurant = Restaurant::find(Auth::id());

        if (!$restaurant) {
            abort(404, 'المطعم غير موجود');
        }

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
            // يمكنك حذف الملف القديم إذا أردت (اختياري)
            $path = $request->file('license_file')->store('licenses', 'public');
            $restaurant->license_path = $path;
        }

        $restaurant->save();

        return redirect()->route('restaurant.profile.edit')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
