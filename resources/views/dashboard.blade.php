<x-app-layout>
<div class="min-h-screen bg-light">
    <!-- Header Section -->
    <div class="bg-primary text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Panel de Control</h1>
            <p class="text-gray-300 mt-2">Sistema Integrado de Planificación e Inversión Pública</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        @auth
            <!-- Bienvenida -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-secondary">
                <h2 class="text-xl font-semibold text-primary mb-2">
                    Bienvenido, {{ auth()->user()->name }}
                </h2>
                <p class="text-neutral">
                    @if(auth()->user()->isAdmin())
                        Tienes acceso completo al sistema como administrador. Gestiona todos los módulos desde aquí.
                    @else
                        Accede a los módulos disponibles según tus permisos asignados.
                    @endif
                </p>
            </div>

            @if(auth()->user()->isAdmin())
                <!-- Estadísticas Rápidas -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-secondary">
                        <div class="flex items-center">
                            <div class="p-3 bg-secondary bg-opacity-20 rounded-full">
                                <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h3M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-neutral">Entidades</p>
                                <p class="text-2xl font-semibold text-primary">{{ $numEntidades }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-accent">
                        <div class="flex items-center">
                            <div class="p-3 bg-accent bg-opacity-20 rounded-full">
                                <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0-8v8m0-8h8a2 2 0 012 2v6a2 2 0 01-2 2h-2M9 5l3 3m0 0l3-3m-3 3V2"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-neutral">Proyectos</p>
                                <p class="text-2xl font-semibold text-primary">{{ $numProyectos }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-color1">
                        <div class="flex items-center">
                            <div class="p-3 bg-color1 bg-opacity-20 rounded-full">
                                <svg class="w-8 h-8 text-color1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-neutral">Programas</p>
                                <p class="text-2xl font-semibold text-primary">{{ $numProgramas }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-neutral">
                        <div class="flex items-center">
                            <div class="p-3 bg-neutral bg-opacity-20 rounded-full">
                                <svg class="w-8 h-8 text-neutral" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-neutral">Usuarios</p>
                                <p class="text-2xl font-semibold text-primary">{{ $numUsuarios }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @canany(['view actividades', 'manage actividades'])
                <!-- Indicadores de Actividades -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-accent">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-primary">Indicadores de Actividades</h3>
                        <a href="{{ route('actividades.index') }}" class="text-sm text-secondary hover:text-accent">
                            Ver actividades
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="bg-light rounded-lg p-4">
                            <p class="text-xs text-neutral">Total activas</p>
                            <p class="text-2xl font-semibold text-primary">{{ $actividadesTotal }}</p>
                        </div>
                        <div class="bg-red-50 rounded-lg p-4">
                            <p class="text-xs text-neutral">En riesgo</p>
                            <p class="text-2xl font-semibold text-red-700">{{ $actividadesEnRiesgo }}</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4">
                            <p class="text-xs text-neutral">Completadas</p>
                            <p class="text-2xl font-semibold text-green-700">{{ $actividadesCompletadas }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-xs text-neutral">No iniciadas</p>
                            <p class="text-2xl font-semibold text-gray-700">{{ $actividadesNoIniciadas }}</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4">
                            <p class="text-xs text-neutral">Avance promedio</p>
                            <p class="text-2xl font-semibold text-blue-700">
                                {{ $avancePromedio !== null ? number_format($avancePromedio, 2) . '%' : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Alertas de Actividades en Riesgo -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-red-400">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-primary">Alertas - Actividades en Riesgo</h3>
                        <a href="{{ route('actividades.index') }}" class="text-sm text-secondary hover:text-accent">
                            Ver todas
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-left text-neutral">
                                    <th class="py-2 pr-4">Actividad</th>
                                    <th class="py-2 pr-4">Proyecto</th>
                                    <th class="py-2 pr-4">Avance</th>
                                    <th class="py-2 pr-4">Variacion (dias)</th>
                                    <th class="py-2 pr-4">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-neutral">
                                @forelse($actividadesEnRiesgoLista as $actividad)
                                    <tr class="border-t border-gray-200">
                                        <td class="py-2 pr-4">
                                            <a class="text-secondary hover:text-accent" href="{{ route('actividades.show', $actividad->id) }}">
                                                {{ $actividad->nombre }}
                                            </a>
                                        </td>
                                        <td class="py-2 pr-4">{{ $actividad->proyecto->nombre ?? 'Sin proyecto' }}</td>
                                        <td class="py-2 pr-4">
                                            {{ $actividad->avance_real !== null ? number_format($actividad->avance_real, 2) . '%' : 'N/A' }}
                                        </td>
                                        <td class="py-2 pr-4">{{ $actividad->variacion_tiempo_dias ?? 'N/A' }}</td>
                                        <td class="py-2 pr-4">
                                            <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-800">
                                                {{ $actividad->estado_reportado }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-t border-gray-200">
                                        <td class="py-3 text-sm text-neutral" colspan="5">No hay actividades en riesgo.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Evidencia de Cumplimiento por Regla -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-blue-400">
                    <h3 class="text-lg font-semibold text-primary mb-4">Evidencia de Cumplimiento por Regla</h3>

                    <div class="space-y-6">
                        <div>
                            <h4 class="text-sm font-semibold text-neutral mb-2">Regla 1 (AND): Cumplido si todos los indicadores estan cumplidos</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead>
                                        <tr class="text-left text-neutral">
                                            <th class="py-2 pr-4">Objetivo</th>
                                            <th class="py-2 pr-4">Actividades</th>
                                            <th class="py-2 pr-4">Indicador Avance</th>
                                            <th class="py-2 pr-4">Indicador Tiempo</th>
                                            <th class="py-2 pr-4">Cumplimiento Plazo</th>
                                            <th class="py-2 pr-4">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-neutral">
                                        @forelse($objetivosIndicadores as $objetivo)
                                            <tr class="border-t border-gray-200">
                                                <td class="py-2 pr-4">{{ $objetivo['descripcion'] }}</td>
                                                <td class="py-2 pr-4">{{ $objetivo['total_actividades'] }}</td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['indicador_avance'] !== null ? number_format($objetivo['indicador_avance'], 2) . '%' : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador1'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['variacion_tiempo'] !== null ? number_format($objetivo['variacion_tiempo'], 2) : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador2'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">{{ $objetivo['indicador3'] }}</td>
                                                <td class="py-2 pr-4">
                                                    <span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                                        {{ $objetivo['cumplimiento_and'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="border-t border-gray-200">
                                                <td class="py-3 text-sm text-neutral" colspan="6">No hay objetivos estrategicos registrados.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-neutral mb-2">Regla 2 (OR): En progreso si al menos un indicador esta cumplido</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead>
                                        <tr class="text-left text-neutral">
                                            <th class="py-2 pr-4">Objetivo</th>
                                            <th class="py-2 pr-4">Actividades</th>
                                            <th class="py-2 pr-4">Indicador Avance</th>
                                            <th class="py-2 pr-4">Indicador Tiempo</th>
                                            <th class="py-2 pr-4">Cumplimiento Plazo</th>
                                            <th class="py-2 pr-4">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-neutral">
                                        @forelse($objetivosIndicadores as $objetivo)
                                            <tr class="border-t border-gray-200">
                                                <td class="py-2 pr-4">{{ $objetivo['descripcion'] }}</td>
                                                <td class="py-2 pr-4">{{ $objetivo['total_actividades'] }}</td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['indicador_avance'] !== null ? number_format($objetivo['indicador_avance'], 2) . '%' : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador1'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['variacion_tiempo'] !== null ? number_format($objetivo['variacion_tiempo'], 2) : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador2'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">{{ $objetivo['indicador3'] }}</td>
                                                <td class="py-2 pr-4">
                                                    <span class="px-2 py-1 rounded-full text-xs bg-indigo-100 text-indigo-800">
                                                        {{ $objetivo['cumplimiento_or'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="border-t border-gray-200">
                                                <td class="py-3 text-sm text-neutral" colspan="6">No hay objetivos estrategicos registrados.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-neutral mb-2">Regla 3 (Otros): Sin indicadores cumplidos</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead>
                                        <tr class="text-left text-neutral">
                                            <th class="py-2 pr-4">Objetivo</th>
                                            <th class="py-2 pr-4">Actividades</th>
                                            <th class="py-2 pr-4">Indicador Avance</th>
                                            <th class="py-2 pr-4">Indicador Tiempo</th>
                                            <th class="py-2 pr-4">Cumplimiento Plazo</th>
                                            <th class="py-2 pr-4">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-neutral">
                                        @forelse($objetivosRegla3 as $objetivo)
                                            <tr class="border-t border-gray-200">
                                                <td class="py-2 pr-4">{{ $objetivo['descripcion'] }}</td>
                                                <td class="py-2 pr-4">{{ $objetivo['total_actividades'] }}</td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['indicador_avance'] !== null ? number_format($objetivo['indicador_avance'], 2) . '%' : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador1'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">
                                                    {{ $objetivo['variacion_tiempo'] !== null ? number_format($objetivo['variacion_tiempo'], 2) : 'N/A' }}
                                                    <span class="ml-2 text-xs text-gray-500">({{ $objetivo['indicador2'] }})</span>
                                                </td>
                                                <td class="py-2 pr-4">{{ $objetivo['indicador3'] }}</td>
                                                <td class="py-2 pr-4">
                                                    <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-800">
                                                        NO_CUMPLIDO
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="border-t border-gray-200">
                                                <td class="py-3 text-sm text-neutral" colspan="6">No hay objetivos en regla 3.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcanany

            <!-- Módulos Principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Configuración Institucional -->
                @canany(['view entidades', 'manage entidades', 'view unidades', 'manage unidades'])
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-gradient-to-r from-secondary to-accent p-4">
                            <h3 class="text-white font-semibold text-lg">Configuración Institucional</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-neutral mb-4">Gestiona la estructura institucional del Estado</p>
                            <div class="space-y-2">
                                @canany(['view entidades', 'manage entidades'])
                                    <a href="{{ route('entidades.index') }}" class="block w-full bg-light hover:bg-secondary hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Entidades
                                    </a>
                                @endcanany
                                @canany(['view unidades', 'manage unidades'])
                                    <a href="{{ route('unidades.index') }}" class="block w-full bg-light hover:bg-secondary hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Unidades
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany

                <!-- Planificación -->
                @canany(['view planes', 'manage planes', 'view pnd', 'manage pnd', 'view objetivos_estrategicos', 'manage objetivos_estrategicos', 'view ods', 'manage ods', 'view strategic alignment', 'manage strategic alignment'])
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-gradient-to-r from-accent to-color2 p-4">
                            <h3 class="text-primary font-semibold text-lg">Planificación</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-neutral mb-4">Administra planes y objetivos estratégicos</p>
                            <div class="space-y-2">
                                @canany(['view planes', 'manage planes'])
                                    <a href="{{ route('planes.index') }}" class="block w-full bg-light hover:bg-accent hover:text-primary text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Planes
                                    </a>
                                @endcanany
                                @canany(['view pnd', 'manage pnd'])
                                    <a href="{{ route('pnd.index') }}" class="block w-full bg-light hover:bg-accent hover:text-primary text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Objetivos PND
                                    </a>
                                @endcanany
                                @canany(['view objetivos_estrategicos', 'manage objetivos_estrategicos'])
                                    <a href="{{ route('objEstrategicos.index') }}" class="block w-full bg-light hover:bg-accent hover:text-primary text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Obj. Estratégicos
                                    </a>
                                @endcanany
                                @canany(['view strategic alignment', 'manage strategic alignment'])
                                    <a href="{{ route('objetivos-institucionales.index') }}" class="block w-full bg-light hover:bg-accent hover:text-primary text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Obj. Institucionales
                                    </a>
                                @endcanany
                                @canany(['view ods', 'manage ods'])
                                    <a href="{{ route('ods.index') }}" class="block w-full bg-light hover:bg-accent hover:text-primary text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        ODS
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany

                <!-- Gestión de Inversión -->
                @canany(['view proyectos', 'manage proyectos', 'view programas', 'manage programas'])
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-gradient-to-r from-color1 to-secondary p-4">
                            <h3 class="text-white font-semibold text-lg">Gestión de Inversión</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-neutral mb-4">Administra proyectos y programas de inversión</p>
                            <div class="space-y-2">
                                @canany(['view proyectos', 'manage proyectos'])
                                    <a href="{{ route('proyectos.index') }}" class="block w-full bg-light hover:bg-color1 hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Proyectos
                                    </a>
                                @endcanany
                                @canany(['view programas', 'manage programas'])
                                    <a href="{{ route('programas.index') }}" class="block w-full bg-light hover:bg-color1 hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Programas
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany

                <!-- Administración de Usuarios -->
                @canany(['view usuarios', 'manage usuarios', 'view roles', 'manage roles', 'view permissions', 'manage permissions'])
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-gradient-to-r from-neutral to-primary p-4">
                            <h3 class="text-white font-semibold text-lg">Administración</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-neutral mb-4">Gestiona usuarios, roles y permisos</p>
                            <div class="space-y-2">
                                @canany(['view usuarios', 'manage usuarios'])
                                    <a href="{{ route('usuarios.index') }}" class="block w-full bg-light hover:bg-neutral hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Usuarios
                                    </a>
                                @endcanany
                                @canany(['view roles', 'manage roles'])
                                    <a href="{{ route('roles.index') }}" class="block w-full bg-light hover:bg-neutral hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Roles
                                    </a>
                                @endcanany
                                @canany(['view permissions', 'manage permissions'])
                                    <a href="{{ route('permissions.index') }}" class="block w-full bg-light hover:bg-neutral hover:text-white text-primary font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Permisos
                                    </a>
                                @endcanany
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>

            <!-- Información de Perfil -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-primary mb-4">Tu Información</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-neutral">Nombre</p>
                        <p class="font-medium text-primary">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-neutral">Email</p>
                        <p class="font-medium text-primary">{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-neutral">Roles</p>
                        <p class="font-medium text-primary">
                            @forelse(auth()->user()->roles as $role)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-secondary text-white mr-1">
                                    {{ $role->name }}
                                </span>
                            @empty
                                <span class="text-neutral">Sin roles asignados</span>
                            @endforelse
                        </p>
                    </div>
                    <div class="flex items-end">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-secondary text-white rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Usuario no autenticado -->
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <div class="mb-4">
                    <svg class="w-16 h-16 text-neutral mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-primary mb-2">Acceso Requerido</h2>
                <p class="text-neutral mb-6">
                    Debes iniciar sesión para acceder al Sistema Integrado de Planificación e Inversión Pública.
                </p>
                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-secondary text-white font-medium rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Iniciar Sesión
                </a>
            </div>
        @endauth
    </div>
</div>
</x-app-layout>
