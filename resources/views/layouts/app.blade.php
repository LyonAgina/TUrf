<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 d-flex flex-column" style="display:flex;flex-direction:column;min-height:100vh;">
            @include('layouts.navigation')

            <!-- Custom Header (no welcome message, no separator) -->
            <header class="bg-white py-2 mb-2"></header>

            <!-- Page Content -->
            <main class="flex-fill d-flex align-items-center justify-content-center" style="flex:1;display:flex;align-items:center;justify-content:center;min-height:70vh;background:#f8fafc;">
                <div class="w-100 d-flex align-items-center justify-content-center" style="min-height:60vh;">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="text-center mt-auto" style="background:#155d27;color:#fff;padding:1rem 0;">
                <div class="container">
                    &copy; {{ date('Y') }} Turf Bila Worry. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>
