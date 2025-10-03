<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIPeIP 2.0 - Sistema Integrado de Planificación e Inversión Pública</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-light to-white"
            <!-- Header con navegación -->
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-secondary text-primary font-semibold rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5v6"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 5v6"></path>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-opacity-90 transition-colors duration-200 mr-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-accent text-primary font-semibold rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-3-6H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                                </svg>
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Contenido principal -->
            <div class="flex flex-col items-center justify-center min-h-screen px-6">
                <!-- Logo/Icono del sistema -->
                <div class="mb-8">
                    <div class="w-24 h-24 bg-primary rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-12 h-12 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Título principal -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl md:text-6xl font-bold text-primary mb-4">
                        SIPeIP 2.0
                    </h1>
                    <h2 class="text-xl md:text-2xl text-neutral mb-6">
                        Sistema Integrado de Planificación e Inversión Pública
                    </h2>
                    <p class="text-lg text-neutral max-w-2xl">
                        Plataforma integral para la gestión eficiente de la planificación e inversión pública, 
                        facilitando la administración de proyectos, programas y objetivos estratégicos del Estado.
                    </p>
                </div>

                <!-- Características principales -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 max-w-4xl">
                    <div class="bg-white rounded-lg shadow-md p-6 text-center border-t-4 border-secondary">
                        <div class="w-12 h-12 bg-secondary bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h3M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2">Gestión Institucional</h3>
                        <p class="text-neutral text-sm">Administra entidades y unidades del Estado de forma eficiente</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 text-center border-t-4 border-accent">
                        <div class="w-12 h-12 bg-accent bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0-8v8m0-8h8a2 2 0 012 2v6a2 2 0 01-2 2h-2M9 5l3 3m0 0l3-3m-3 3V2"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2">Planificación Estratégica</h3>
                        <p class="text-neutral text-sm">Define y gestiona objetivos PND y ODS con precisión</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 text-center border-t-4 border-color1">
                        <div class="w-12 h-12 bg-color1 bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-color1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-primary mb-2">Inversión Pública</h3>
                        <p class="text-neutral text-sm">Controla proyectos y programas de inversión del Estado</p>
                    </div>
                </div>

                <!-- Botón de acceso -->
                @guest
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-secondary to-accent text-primary font-bold text-lg rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Acceder al Sistema
                        </a>
                    </div>
                @endguest
            </div>

            <!-- Footer -->
            <footer class="absolute bottom-0 w-full p-6 text-center text-neutral text-sm">
                <p>&copy; {{ date('Y') }} SIPeIP 2.0 - Sistema Integrado de Planificación e Inversión Pública</p>
            </footer>
        </div>
    </body>
</html>
