<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Restaurant Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-72 bg-gray-900 text-white hidden md:flex flex-col fixed inset-y-0 left-0 z-50 shadow-lg">
            <div class="p-6 border-b border-gray-800 flex items-center justify-between">
                <span class="text-xl font-bold tracking-wide">Restaurant Dashboard</span>
            </div>
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ url('/restaurant/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->is('restaurant/dashboard*') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/restaurant/my-products') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition {{ request()->is('restaurant/my-products*') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <span>Products</span>
                </a>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('restaurant.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 transition">
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 md:ml-72 flex flex-col min-h-screen">
            <header class="bg-white border-b border-gray-100 h-16 flex items-center justify-between px-8 shadow-sm">
                <h2 class="text-lg font-bold text-gray-800">@yield('title')</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('restaurant.profile.edit') }}" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition">
                        <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span>Profile</span>
                    </a>
                </div>
            </header>

            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>