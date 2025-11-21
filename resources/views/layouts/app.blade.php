<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <!-- Custom Header (no welcome message, no separator) -->
            <header class="bg-white py-2 mb-2"></header>

            <!-- Page Content -->
            <main class="flex-fill d-flex align-items-center justify-content-center" style="flex:1;display:flex;align-items:center;justify-content:center;min-height:70vh;background:#f8fafc;">
                <div class="w-full flex items-center justify-center min-h-[60vh]">
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
