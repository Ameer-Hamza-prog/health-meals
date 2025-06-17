<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // عرض كل المنتجات للمطعم الحالي
    public function index()
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId) {
            abort(403, 'غير مصرح لك بالوصول');
        }

        $products = Product::where('restaurant_id', $restaurantId)->get();

        return view('products.index', compact('products'));
    }

    // عرض صفحة إنشاء منتج جديد
    public function create()
    {
        return view('products.create');
    }

    // تخزين منتج جديد
    public function store(Request $request)
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId) {
            abort(403, 'غير مصرح لك بالوصول');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->restaurant_id = $restaurantId;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public'); // => storage/app/public/products
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'تمت إضافة المنتج بنجاح.');
    }

    // عرض صفحة تعديل المنتج
    public function edit(Product $product)
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId || $product->restaurant_id != $restaurantId) {
            abort(403, 'غير مصرح لك بالوصول إلى هذا المنتج');
        }

        return view('products.edit', compact('product'));
    }

    // تحديث بيانات المنتج
    public function update(Request $request, Product $product)
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId || $product->restaurant_id != $restaurantId) {
            abort(403, 'غير مصرح لك بتحديث هذا المنتج');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    // حذف منتج
    public function destroy(Product $product)
    {
        $restaurantId = session('restaurant_id');

        if (!$restaurantId || $product->restaurant_id != $restaurantId) {
            abort(403, 'غير مصرح لك بحذف هذا المنتج');
        }

        // حذف الصورة من التخزين
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'تم حذف المنتج.');
    }
}
