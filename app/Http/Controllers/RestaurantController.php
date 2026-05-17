<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    // قائمة المطاعم مع بحث
    public function index(Request $request)
    {
        $search = $request->input('search');

        $restaurants = Restaurant::when($search, function($query, $search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })->paginate(10);

        return view('dashboardadmin.restaurants.index', compact('restaurants', 'search'));
    }

    // صفحة إنشاء مطعم جديد
    public function create()
    {
        $diets = Diet::all();
        return view('dashboardadmin.restaurants.create', compact('diets'));
    }

    // تخزين مطعم جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => 'required|email|unique:restaurants,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'license' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // الرخصة يجب ان تكون ملف PDF أو صورة
            'diet_id' => 'required|exists:diets,id',
            'username' => 'required|string|unique:restaurants,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // رفع ملف الرخصة
        $licensePath = $request->file('license')->store('licenses', 'public');

        Restaurant::create([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'license_path' => $licensePath,
            'diet_id' => $request->diet_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => 'pending', // يبدأ في حالة انتظار التفعيل
        ]);

        return redirect()->route('restaurants.index')->with('success', 'تم إضافة المطعم بنجاح وانتظار التفعيل');
    }

    // صفحة تعديل بيانات المطعم
    public function edit(Restaurant $restaurant)
    {
        $diets = Diet::all();
        return view('dashboardadmin.restaurants.edit', compact('restaurant', 'diets'));
    }

    // تحديث بيانات المطعم
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => "required|email|unique:restaurants,email,{$restaurant->id}",
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'license' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'diet_id' => 'required|exists:diets,id',
            'username' => "required|string|unique:restaurants,username,{$restaurant->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        if ($request->hasFile('license')) {
            // حذف الملف القديم إذا موجود
            if ($restaurant->license_path) {
                Storage::disk('public')->delete($restaurant->license_path);
            }
            $licensePath = $request->file('license')->store('licenses', 'public');
        } else {
            $licensePath = $restaurant->license_path;
        }

        $restaurant->update([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'license_path' => $licensePath,
            'diet_id' => $request->diet_id,
            'username' => $request->username,
            'status' => $request->status,
        ]);

        // تحديث كلمة المرور إذا تم إدخالها
        if ($request->password) {
            $restaurant->password = Hash::make($request->password);
            $restaurant->save();
        }

        return redirect()->route('restaurants.index')->with('success', 'تم تحديث بيانات المطعم بنجاح');
    }

    // حذف المطعم
    public function destroy(Restaurant $restaurant)
    {
        // حذف ملف الرخصة
        if ($restaurant->license_path) {
            Storage::disk('public')->delete($restaurant->license_path);
        }

        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'تم حذف المطعم بنجاح');
    }

        public function createrestaurants()
    {
        $diets = Diet::all();
        return view('restaurant.request', compact('diets'));
    }
public function storePublic(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'owner_name' => 'required|string|max:255',
        'email' => 'required|email|unique:restaurants,email',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
        'license' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'diet_id' => 'required|exists:diets,id',
    ]);

    $licensePath = $request->file('license')->store('licenses', 'public');

    Restaurant::create([
        'name' => $request->name,
        'owner_name' => $request->owner_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'license_path' => $licensePath,
        'diet_id' => $request->diet_id,
        // لا نُدرج username أو password هنا
        'status' => 'pending',
    ]);

    return redirect()->route('restaurants.join.pending')->with('success', 'تم إرسال طلبك بنجاح وهو قيد المراجعة');
}
public function showLoginForm()
{
    return view('restaurant.auth.login'); // مسار الصفحة التي أرسلتها
}


public function loginrestrunts(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $restaurant = Restaurant::where("email", $request->email)->first();

    if (!$restaurant) {
        return back()->withErrors(['email' => 'اسم المستخدم أو البريد غير صحيح']);
    }

    if ($restaurant->status !== 'approved') {
        return back()->withErrors(['email' => 'لم يتم الموافقة على الحساب بعد']);
    }

    if (!Hash::check($request->password, $restaurant->password)) {
        return back()->withErrors(['password' => 'كلمة المرور غير صحيحة']);
    }

    // تسجيل دخول يدوي باستخدام session
    session(['restaurant_id' => $restaurant->id]);

    return redirect()->route('restaurant.dashboard'); // المسار للوحة المطعم
}

}
