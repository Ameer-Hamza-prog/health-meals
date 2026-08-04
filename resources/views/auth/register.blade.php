
@extends("layouts.guest")

@section("content")
<div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 mx-auto mt-10 mb-10">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Create Account</h1>
        <p class="text-gray-600 mt-2">Join FitEats to start your health journey</p>
    </div>

    <form method="POST" action="{{ route("register") }}">
        @csrf

        <div class="mb-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input id="name" type="text" name="name" value="{{ old("name") }}" required autofocus
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500 @error("name") border-red-500 @enderror">
            @error("name")
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old("email") }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500 @error("email") border-red-500 @enderror">
            @error("email")
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500 @error("password") border-red-500 @enderror">
            @error("password")
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500">
        </div>

        <button type="submit"
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3.5 rounded-xl transition">
            Register
        </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
        Already registered? 
        <a href="{{ route("login") }}" class="text-emerald-600 hover:underline font-medium">Log in</a>
    </p>
</div>
@endsection

