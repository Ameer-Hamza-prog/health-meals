@extends($layout ?? 'layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Profile Settings</h1>
        <p class="text-gray-500 mt-1">Manage your account information and password</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Information Card -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile Information</h2>
            
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                    
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- User Info Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="text-center">
                <div class="w-20 h-20 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl font-bold mx-auto mb-3">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Member since</span><br>
                        {{ $user->created_at->format('F j, Y') }}
                    </p>
                    <p class="text-sm text-gray-600 mt-2">
                        <span class="font-medium">Last updated</span><br>
                        {{ $user->updated_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Card -->
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Update Password</h2>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                    <input type="password" name="current_password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" name="password_confirmation" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
            </div>
            
            <button type="submit" class="mt-4 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg transition">
                Update Password
            </button>
        </form>
    </div>
</div>
@endsection
