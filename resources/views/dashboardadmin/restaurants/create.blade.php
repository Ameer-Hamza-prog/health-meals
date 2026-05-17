@extends('layouts.admindashboard')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Add New Restaurant</h2>
                <p class="text-gray-500 text-sm">Register a new restaurant partner</p>
            </div>
        </div>

        <form action="{{ route('restaurants.store') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Restaurant Name</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex gap-3">
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg transition">Save Restaurant</button>
                    <a href="{{ route('restaurants.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
