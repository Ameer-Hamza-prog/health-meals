<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Health Meals - Dashboard</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col shadow-lg">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-emerald-50 to-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold text-xl shadow-md">H</div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Health Meals</h1>
                        <p class="text-xs text-emerald-600 font-medium">Admin Panel</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-700 font-medium shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('diets.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('diets.*') ? 'bg-emerald-50 text-emerald-700 font-medium shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Diets
                </a>

                <a href="{{ route('restaurants.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('restaurants.*') ? 'bg-emerald-50 text-emerald-700 font-medium shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Restaurants
                </a>

                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('users.*') ? 'bg-emerald-50 text-emerald-700 font-medium shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Users
                </a>
            </nav>

            <div class="p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl w-full transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Modern Header -->
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shadow-sm">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-sm text-gray-500">Welcome back, Admin</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-700 font-medium hidden sm:block">Admin User</span>
                        <a href="{{ route('profile.edit') }}" class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold hover:bg-emerald-200 transition shadow-sm border border-emerald-200">
                            A
                        </a>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-auto p-8">
                @if(View::hasSection('inner-content'))
                    @yield('inner-content')
                @else
                    @yield('content')
                @endif
            </div>
        </main>
    </div>
</body>
</html>
