<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

// ======================
// PUBLIC ROUTES
// ======================
Route::get('/', function () {
    return view('welcome');
});

// ======================
// AUTH ROUTES (included from auth.php)
// ======================
require __DIR__.'/auth.php';

// ======================
// AUTHENTICATED USER ROUTES
// ======================
Route::middleware(['auth'])->group(function () {
    // Dashboard (dynamic based on role)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Customer Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// ======================
// ADMIN-ONLY ROUTES
// ======================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('diets', DietController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('restaurants', RestaurantController::class);
});

// ======================
// RESTAURANT PUBLIC ROUTES
// ======================
// Restaurant join/registration
Route::get('/restaurant/join', [RestaurantController::class, 'createrestaurants'])->name('restaurants.join.request');
Route::post('/restaurant/join', [RestaurantController::class, 'storePublic'])->name('restaurants.join.submit');
Route::get('/restaurant/join/pending', function () {
    return view('restaurant.pending');
})->name('restaurants.join.pending');

// Restaurant login
Route::get('/restaurant/restaurant/login', [RestaurantController::class, 'showLoginForm'])->name('restaurant.login');
Route::post('/restaurant/restaurant/login', [RestaurantController::class, 'loginrestrunts'])->name('restaurant.login.submit');

// ======================
// RESTAURANT AUTHENTICATED ROUTES
// ======================
Route::prefix('restaurant')->name('restaurant.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [RestaurantDashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile/edit', [RestaurantDashboardController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [RestaurantDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [RestaurantDashboardController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [RestaurantDashboardController::class, 'destroy'])->name('profile.destroy');
    
    // Logout
    Route::post('/logout', [RestaurantDashboardController::class, 'logout'])->name('logout');
    
    // Additional restaurant pages
    Route::get('/my-products', function() { 
        return view('restaurant.products.index', ['title' => 'منتجاتي']); 
    })->name('products.index');
    
    Route::get('/my-products/create', function() { 
        return view('restaurant.products.create', ['title' => 'إضافة منتج جديد']); 
    })->name('products.create');
    
    Route::get('/orders', function() { 
        return view('restaurant.orders.index', ['title' => 'طلباتي']); 
    })->name('orders.index');
    
    Route::get('/customers', function() { 
        return view('restaurant.customers.index', ['title' => 'عملائي']); 
    })->name('customers.index');
    
    Route::get('/analytics', function() { 
        return view('restaurant.analytics.index', ['title' => 'التقارير']); 
    })->name('analytics.index');
    
    Route::get('/settings', function() { 
        return view('restaurant.settings.index', ['title' => 'الإعدادات']); 
    })->name('settings.index');
});

// ======================
// TEST & DEBUG ROUTES
// ======================
Route::get('/test-profile', function() {
    return view('test-profile');
});

Route::get('/check-auth', function() {
    return response()->json([
        'authenticated' => Auth::check(),
        'user' => Auth::check() ? [
            'id' => Auth::id(),
            'email' => Auth::user()->email,
            'name' => Auth::user()->name
        ] : null,
        'session_id' => session()->getId(),
        'session_driver' => config('session.driver')
    ]);
});

Route::get('/check-auth-debug', function() {
    return [
        'authenticated' => Auth::check(),
        'user' => Auth::user() ? Auth::user()->email : null,
        'session_id' => session()->getId(),
        'guard' => Auth::getDefaultDriver()
    ];
});

Route::get('/auth-check', function() {
    return view('auth-check');
});