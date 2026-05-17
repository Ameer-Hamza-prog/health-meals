<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Health Meals - {{ $title ?? 'Restaurant Management' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Bootstrap (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom Styles -->
        <style>
            :root {
                --primary-color: #4f46e5;
                --secondary-color: #10b981;
            }
            .auth-container {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .auth-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
                padding: 40px;
                width: 100%;
                max-width: 450px;
            }
            .brand-logo {
                text-align: center;
                margin-bottom: 30px;
            }
            .brand-logo h1 {
                color: var(--primary-color);
                font-size: 2.5rem;
                font-weight: 800;
                margin-bottom: 10px;
                background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .brand-logo .tagline {
                color: #6b7280;
                font-size: 1rem;
                font-weight: 500;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="auth-container">
            <div class="auth-card">
                <!-- YOUR BRANDING -->
                <div class="brand-logo">
                    <h1>Health Meals</h1>
                    <p class="tagline">Professional Restaurant Management</p>
                </div>
                
                <!-- AUTH CONTENT -->
                {{ $slot }}
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>