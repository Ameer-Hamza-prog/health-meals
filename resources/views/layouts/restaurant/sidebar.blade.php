<!-- ============================================================== -->
<!-- Restaurant Dashboard Sidebar -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('restaurant.dashboard') }}" class="text-nowrap logo-img d-flex align-items-center">
                <img src="{{ asset('build/assets/images/logos/seodashlogo.png') }}" width="120" alt="Health Meals" />
                <span class="logo-text">لوحة تحكم المطعم</span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                
                <!-- الرئيسية -->
                <li class="nav-small-cap">
                    <i class="ti ti-dashboard"></i>
                    <span class="hide-menu">الرئيسية</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.dashboard') ? 'active' : '' }}" 
                       href="{{ route('restaurant.dashboard') }}">
                        <i class="ti ti-layout-dashboard"></i>
                        <span class="hide-menu">لوحة التحكم</span>
                    </a>
                </li>

                <!-- إدارة القائمة -->
                <li class="nav-small-cap">
                    <i class="ti ti-utensils"></i>
                    <span class="hide-menu">إدارة القائمة</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.products.*') ? 'active' : '' }}" 
                       href="{{ route('restaurant.products.index') }}">
                        <i class="ti ti-package"></i>
                        <span class="hide-menu">المنتجات</span>
                    </a>
                </li>

                <!-- الطلبات -->
                <li class="nav-small-cap">
                    <i class="ti ti-shopping-cart"></i>
                    <span class="hide-menu">الطلبات</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.orders.*') ? 'active' : '' }}" 
                       href="{{ route('restaurant.orders.index') }}">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="hide-menu">الطلبات</span>
                    </a>
                </li>

                <!-- العملاء -->
                <li class="nav-small-cap">
                    <i class="ti ti-users"></i>
                    <span class="hide-menu">العملاء</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.customers.*') ? 'active' : '' }}" 
                       href="{{ route('restaurant.customers.index') }}">
                        <i class="ti ti-users"></i>
                        <span class="hide-menu">العملاء</span>
                    </a>
                </li>

                <!-- التقارير -->
                <li class="nav-small-cap">
                    <i class="ti ti-chart-bar"></i>
                    <span class="hide-menu">التقارير</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.analytics.*') ? 'active' : '' }}" 
                       href="{{ route('restaurant.analytics.index') }}">
                        <i class="ti ti-chart-bar"></i>
                        <span class="hide-menu">التقارير</span>
                    </a>
                </li>

                <!-- الإعدادات -->
                <li class="nav-small-cap">
                    <i class="ti ti-settings"></i>
                    <span class="hide-menu">الإعدادات</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.profile.edit') ? 'active' : '' }}" 
                       href="{{ route('restaurant.profile.edit') }}">
                        <i class="ti ti-user-circle"></i>
                        <span class="hide-menu">الملف الشخصي</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('restaurant.settings.*') ? 'active' : '' }}" 
                       href="{{ route('restaurant.settings.index') }}">
                        <i class="ti ti-settings"></i>
                        <span class="hide-menu">الإعدادات</span>
                    </a>
                </li>

                <!-- تسجيل الخروج -->
                <li class="sidebar-item mt-4">
                    <form method="POST" action="{{ route('restaurant.logout') }}">
                        @csrf
                        <button type="submit" class="sidebar-link w-100 text-start">
                            <i class="ti ti-logout"></i>
                            <span class="hide-menu">تسجيل الخروج</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
