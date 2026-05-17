@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Order #{{ $order->id }}</h2>
                    <p class="text-gray-500 text-sm">Placed on {{ $order->created_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
                <span class="px-3 py-1 rounded text-sm
                    @if($order->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($order->status == 'confirmed') bg-blue-100 text-blue-700
                    @elseif($order->status == 'preparing') bg-orange-100 text-orange-700
                    @elseif($order->status == 'delivered') bg-green-100 text-green-700
                    @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div class="space-y-4">
                <div class="border-t border-gray-100 pt-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Diet</p>
                            <p class="text-gray-800">{{ $order->diet->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Restaurant</p>
                            <p class="text-gray-800">{{ $order->restaurant->name }}</p>
                        </div>
                    </div>
                </div>

                @if($order->notes)
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm text-gray-500 font-medium">Notes</p>
                    <p class="text-gray-800">{{ $order->notes }}</p>
                </div>
                @endif

                <div class="border-t border-gray-100 pt-4">
                    <p class="text-sm text-gray-500 font-medium">Total</p>
                    <p class="text-2xl font-bold text-emerald-600">${{ number_format($order->total, 2) }}</p>
                </div>

                <div class="pt-4 flex gap-3">
                    <a href="{{ route('orders.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition">Back to Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
