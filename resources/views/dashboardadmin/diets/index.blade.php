@extends('layouts.admindashboard')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">🥗 Diet Management</h1>
        <a href="{{ route('diets.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg">+ Add Diet</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($diets as $diet)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-6 border-l-4 border-emerald-500">
            <h3 class="text-lg font-bold text-gray-800">{{ $diet->name }}</h3>
            <p class="text-gray-600 text-sm mt-2">{{ $diet->description ?? 'No description' }}</p>
            <div class="mt-4 flex gap-2">
                <span class="text-xs bg-emerald-100 text-emerald-700 px-2 py-1 rounded">🔥 {{ $diet->calories ?? 'N/A' }} cal</span>
                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">💪 {{ $diet->protein ?? 'N/A' }}g protein</span>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="{{ route('diets.edit', $diet->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                <form action="{{ route('diets.destroy', $diet->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
