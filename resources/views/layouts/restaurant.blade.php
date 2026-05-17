<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Restaurant Dashboard')</title>

    <!-- THEME CSS -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('build/assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.min.css') }}" />
    
    <style>
        /* Fix sidebar width and layout */
        .left-sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            background: linear-gradient(180deg, #1a1e2b 0%, #2d3340 100%);
            z-index: 100;
            overflow-y: auto;
            box-shadow: -5px 0 20px rgba(0,0,0,0.1);
        }

        .body-wrapper {
            margin-right: 280px;
            width: calc(100% - 280px);
            min-height: 100vh;
            background: #f8f9fa;
        }

        /* Brand logo */
        .brand-logo {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .brand-logo img {
            max-height: 45px;
            width: auto;
            object-fit: contain;
        }

        .logo-text {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            margin-right: 10px;
        }

        /* Sidebar navigation */
        .sidebar-nav {
            padding: 20px 0;
        }

        #sidebarnav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-small-cap {
            padding: 20px 20px 8px 20px;
            color: #a0a6b5;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .nav-small-cap i {
            margin-left: 8px;
            font-size: 1rem;
            color: #fd746c;
        }

        .sidebar-item {
            margin: 2px 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #a0a6b5;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .sidebar-link i {
            margin-left: 12px;
            font-size: 1.2rem;
            color: #a0a6b5;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(-5px);
        }

        .sidebar-link:hover i {
            color: #fd746c;
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, #fd746c 0%, #ff9068 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(253,116,108,0.3);
        }

        .sidebar-link.active i {
            color: white;
        }

        .hide-menu {
            flex: 1;
        }

        /* Header */
        .app-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 25px;
            margin-bottom: 20px;
            border-radius: 0 0 15px 15px;
        }

        /* Container */
        .container-fluid {
            padding: 20px 25px;
        }

        /* Scrollbar */
        .left-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .left-sidebar::-webkit-scrollbar-track {
            background: #2d3340;
        }

        .left-sidebar::-webkit-scrollbar-thumb {
            background: #fd746c;
            border-radius: 10px;
        }

        /* Logout button */
        .sidebar-item form button.sidebar-link {
            background: transparent;
            border: none;
            width: 100%;
            text-align: right;
            cursor: pointer;
        }

        .sidebar-item form button.sidebar-link:hover {
            background: #c0392b;
        }

        .sidebar-item.mt-4 {
            margin-top: 30px;
        }

        /* Responsive */
        @media (max-width: 1199px) {
            .left-sidebar {
                transform: translateX(100%);
                transition: transform 0.3s;
            }
            .left-sidebar.show {
                transform: translateX(0);
            }
            .body-wrapper {
                margin-right: 0;
                width: 100%;
            }
            .app-header {
                right: 0;
            }
        }

        /* Cards styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .badge.bg-success { background: linear-gradient(135deg, #27ae60, #2ecc71) !important; }
        .badge.bg-warning { background: linear-gradient(135deg, #f39c12, #f1c40f) !important; color: white; }
        .badge.bg-primary { background: linear-gradient(135deg, #fd746c, #ff9068) !important; }
    </style>
</head>
<body>

<div class="page-wrapper" id="main-wrapper"
     data-layout="vertical"
     data-navbarbg="skin6"
     data-sidebartype="full"
     data-sidebar-position="fixed"
     data-header-position="fixed">

    {{-- SIDEBAR --}}
    @include('layouts.restaurant.sidebar')

    <div class="body-wrapper">
        {{-- HEADER --}}
        @include('layouts.restaurant.header')

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<!-- THEME JS -->
<script src="{{ asset('build/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('build/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/assets/js/app.min.js') }}"></script>

<script>
    // Sidebar toggle for mobile
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarCollapse');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                document.querySelector('.left-sidebar').classList.toggle('show');
            });
        }
    });
</script>

</body>
</html>
