@extends("layouts.restaurant")

@section("title", "Restaurant Profile")

@section("content")
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h1 class="text-2xl font-bold text-gray-800">Restaurant Profile</h1>
        <p class="text-sm text-gray-500 mt-1">Manage your account details and settings.</p>
    </div>

    @if(session("success"))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-sm">
            {{ session("success") }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm">
            Please fix the errors below before saving.
        </div>
    @endif

    <!-- Profile Form & Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Account Information</h3>
            <form action="{{ route("restaurant.profile.update") }}" method="POST" class="space-y-4">
                @csrf
                @method("PUT")
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Restaurant Name</label>
                    <input type="text" id="name" name="name" value="{{ old("name", $restaurant->name ?? (auth()->user()->name ?? "")) }}" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-600" required>
                    @error("name")
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old("email", $restaurant->email ?? (auth()->user()->email ?? "")) }}" class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-600" required>
                    @error("email")
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-2">
                    <button type="submit" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-sm font-medium hover:bg-emerald-700 transition shadow-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Sidebar Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                {{ strtoupper(substr($restaurant->name ?? (auth()->user()->name ?? 'R'), 0, 1)) }}
            </div>
            <h4 class="text-lg font-bold text-gray-800">{{ $restaurant->name ?? (auth()->user()->name ?? 'Restaurant') }}</h4>
            <p class="text-sm text-gray-500 mb-4">{{ $restaurant->email ?? (auth()->user()->email ?? 'No email') }}</p>
            <span class="inline-block bg-emerald-50 text-emerald-600 text-xs font-semibold px-3 py-1 rounded-full">Active Restaurant</span>
        </div>
    </div>
</div>
@endsection