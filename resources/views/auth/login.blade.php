@extends("layouts.guest")

@section("content")
<div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 mx-auto mt-10">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
        <p class="text-gray-600 mt-2">Sign in to your account</p>
    </div>

    @if (session("status"))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm">
            {{ session("status") }}
        </div>
    @endif

    <form method="POST" action="{{ route("login") }}">
        @csrf

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" name="email" value="{{ old("email") }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500">
            @error("email")
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password"
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-emerald-500">
            @error("password")
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center text-sm">
                <input type="checkbox" name="remember" class="w-4 h-4 text-emerald-600">
                <span class="ml-2 text-gray-600">Remember me</span>
            </label>
            
            @if (Route::has("password.request"))
                <a href="{{ route("password.request") }}" class="text-sm text-emerald-600 hover:underline">
                    Forgot Password?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3.5 rounded-xl transition">
            Log In
        </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
        Don`t have an account? 
        <a href="{{ route("register") }}" class="text-emerald-600 hover:underline font-medium">Register here</a>
    </p>
</div>
@endsection
