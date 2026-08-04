<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $restaurantId = auth()->id();
        $products = Product::where('restaurant_id', $restaurantId)->latest()->get();

        return view('restaurant.products.index', compact('products'));
    }

    public function create()
    {
        return view('restaurant.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
        ]);

        $validated['restaurant_id'] = auth()->id();

        Product::create($validated);

        return redirect()->route('restaurant.products.index')->with('success', 'Product created successfully.');
    }
}
