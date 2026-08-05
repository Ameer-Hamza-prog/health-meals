@extends('layouts.admindashboard')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">🍽️ Restaurant Management</h1>
        <a href="{{ route('restaurants.create') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">+ Add Restaurant</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($restaurants as $restaurant)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-6 border-l-4 border-orange-500">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 text-xl">🍴</div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $restaurant->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $restaurant->location ?? 'Location not set' }}</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mt-2">{{ $restaurant->description ?? 'No description' }}</p>
            <div class="mt-4 flex gap-2">
                <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
