@extends("layouts.restaurant")

@section("title", "Restaurant Dashboard")

@section("content")
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Welcome to your Restaurant Dashboard</h1>
            <p class="text-sm text-gray-500 mt-1">Easily manage your restaurant operations and track performance.</p>
        </div>
        <div>
            <a href="{{ route('restaurant.products.create') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl text-sm font-medium hover:bg-emerald-700 transition shadow-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Add New Product</span>
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Products</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">24</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Today's Orders</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">156</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Customers</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">1,234</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Revenue</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">$4,560</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Orders -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:col-span-2">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Orders</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-xs font-semibold text-gray-400 uppercase">
                            <th class="py-3 px-4">Order ID</th>
                            <th class="py-3 px-4">Customer</th>
                            <th class="py-3 px-4">Time</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm text-gray-600">
                        <tr>
                            <td class="py-3 px-4 font-medium text-gray-800">#ORD-001</td>
                            <td class="py-3 px-4">Ahmed Mohammed</td>
                            <td class="py-3 px-4 text-gray-400">10 mins ago</td>
                            <td class="py-3 px-4 font-semibold text-gray-800">$45.00</td>
                            <td class="py-3 px-4"><span class="px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-600">Completed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-medium text-gray-800">#ORD-002</td>
                            <td class="py-3 px-4">Sara Ali</td>
                            <td class="py-3 px-4 text-gray-400">25 mins ago</td>
                            <td class="py-3 px-4 font-semibold text-gray-800">$32.50</td>
                            <td class="py-3 px-4"><span class="px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-600">Pending</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-medium text-gray-800">#ORD-003</td>
                            <td class="py-3 px-4">Khaled Hassan</td>
                            <td class="py-3 px-4 text-gray-400">1 hour ago</td>
                            <td class="py-3 px-4 font-semibold text-gray-800">$67.80</td>
                            <td class="py-3 px-4"><span class="px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600">Processing</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Top Products</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Beef Burger</span>
                    <span class="text-sm font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">42 sold</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Pizza Pepperoni</span>
                    <span class="text-sm font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">38 sold</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Caesar Salad</span>
                    <span class="text-sm font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">31 sold</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Soft Drinks</span>
                    <span class="text-sm font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">28 sold</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
