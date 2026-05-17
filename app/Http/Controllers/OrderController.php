<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Diet;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $diets = Diet::all();
        $restaurants = Restaurant::all();
        return view('orders.create', compact('diets', 'restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'diet_id' => 'required|exists:diets,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'notes' => 'nullable|string|max:500',
        ]);

        $diet = Diet::find($request->diet_id);
        $total = $diet->price ?? 0;

        Order::create([
            'user_id' => Auth::id(),
            'diet_id' => $request->diet_id,
            'restaurant_id' => $request->restaurant_id,
            'total' => $total,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }
}