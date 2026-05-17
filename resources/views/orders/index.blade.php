@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Orders</h1>
        <a href="{{ route('orders.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg">+ New Order</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="text-left p-4 text-gray-600 font-medium">Order #</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Diet</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Restaurant</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Total</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Status</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Date</th>
                    <th class="text-left p-4 text-gray-600 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">#{{ $order->id }}</td>
                    <td class="p-4">{{ $order->diet->name }}</td>
                    <td class="p-4">{{ $order->restaurant->name }}</td>
                    <td class="p-4 font-bold text-emerald-600">${{ number_format($order->total, 2) }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded text-xs 
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'confirmed') bg-blue-100 text-blue-700
                            @elseif($order->status == 'preparing') bg-orange-100 text-orange-700
                            @elseif($order->status == 'delivered') bg-green-100 text-green-700
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                    <td class="p-4">
                        <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
