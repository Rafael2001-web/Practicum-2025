<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <title>Sistema Integrado de Planificación e Inversión Pública - SIPeIP 2.0 @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        {{-- Page Heading --}}
        @if (isset($header))
            <header class="bg-primary shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-white text-2xl font-bold">Sistema Integrado de Planificación e Inversión Pública</h1>
                </div>
            </header>
        @endif

        {{-- Contenido principal --}}
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-gray-200 p-4 text-center">
        <small>&copy; {{ date('Y') }} SIPeIP 2.0</small>
    </footer>
</body>
</html>