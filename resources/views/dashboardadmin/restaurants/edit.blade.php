@extends('layouts.admindashboard')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Restaurant</h2>
                <p class="text-gray-500 text-sm">Update restaurant information</p>
            </div>
        </div>

        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Restaurant Name</label>
                    <input type="text" name="name" value="{{ $restaurant->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location" value="{{ $restaurant->location }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">{{ $restaurant->description }}</textarea>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex gap-3">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition">Update Restaurant</button>
                    <a href="{{ route('restaurants.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
