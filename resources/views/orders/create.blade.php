@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Place New Order</h2>
                    <p class="text-gray-500 text-sm">Order your favorite healthy meal</p>
                </div>
            </div>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Select Diet</label>
                        <select name="diet_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                            <option value="">Choose a diet plan</option>
                            @foreach($diets as $diet)
                                <option value="{{ $diet->id }}">{{ $diet->name }} - ${{ number_format($diet->price ?? 0, 2) }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Select Restaurant</label>
                        <select name="restaurant_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                            <option value="">Choose a restaurant</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Notes (optional)</label>
                        <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Any special requests?"></textarea>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex gap-3">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg transition">Place Order</button>
                        <a href="{{ route('orders.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
