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

    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f2f2f2;
        color: #333;
    }
    header, nav, footer {
        padding: 15px;
    }
    header {
        background-color: #003366;
        color: white;
    }
    h1 {
        background-color: #003366;
        color: white;
    }
    nav {
        background-color: #00a524;
    }
    nav a {
        color: white;
        margin-right: 20px;
        text-decoration: none;
    }
    nav a:hover {
        text-decoration: underline;
    }
    main {
        padding: 20px;
    }
    footer {
        background-color: #ddd;
        text-align: center;
    }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        {{-- Page Heading --}}
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1>Sistema Integrado de Planificación e Inversión Pública</h1>
                </div>
            </header>
        @endif

        {{-- Barra de navegación secundaria --}}
        <nav>
            {{-- Enlace al dasboard siempre disponible --}}
            <a href="{{ url('/dashboard') }}">dashboard</a>

            {{-- Enlaces sólo para admin --}}
          
                <a href="{{ route('entidades.index') }}">Entidades</a>
                
                <a href="{{ route('unidades.index') }}">Unidades</a>
                <a href="{{ route('objEstrategicos.index') }}">Objetivos Estratégicos</a>
                <a href="">Objetivos ODS</a>
                <a href="{{ route('programas.index') }}">Programas</a>


        </nav>

        {{-- Contenido principal --}}
        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <small>&copy; {{ date('2025') }} SIPeIP 2.0</small>
    </footer>
</body>
</html>