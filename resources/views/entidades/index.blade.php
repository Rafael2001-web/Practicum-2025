<x-app-layout>
    @section('title', 'Entidades')
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Entidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    {{-- Validacion mensaje --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <div class="bg-white">
                        <x-table 
                            :headers="[
                                ['label' => 'ID', 'type' => 'text'],
                                ['label' => 'Código', 'type' => 'text'],
                                ['label' => 'Subsector', 'type' => 'text'],
                                ['label' => 'Nivel de Gobierno', 'type' => 'text'],
                                ['label' => 'Estado', 'type' => 'badge'],
                                ['label' => 'Fecha de Creación', 'type' => 'date'],
                                ['label' => 'Fecha de Actualización', 'type' => 'date'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            id="entidades-table"
                            title="Gestión de Entidades"
                        >
                            <x-slot name="buttons">
                                <a href="{{ route('entidades.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nueva Entidad
                                </a>
                            </x-slot>

                            <tbody>
                                @foreach ($entidades as $entidad)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $entidad->idEntidad }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ $entidad->codigo }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->subSector }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->nivelGobierno }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if ($entidad->estado == 'activo' || $entidad->estado == '1' || $entidad->estado == 1) bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800 @endif">
                                                {{ $entidad->estado == 'activo' || $entidad->estado == '1' || $entidad->estado == 1 ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $entidad->fechaCreacion ? \Carbon\Carbon::parse($entidad->fechaCreacion)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $entidad->fechaActualizacion ? \Carbon\Carbon::parse($entidad->fechaActualizacion)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('entidades.show', $entidad->idEntidad) }}" 
                                                   class="text-color1 hover:text-color2 font-medium transition-colors duration-150">
                                                    Ver
                                                </a>
                                                <a href="{{ route('entidades.edit', $entidad->idEntidad) }}" 
                                                   class="text-indigo-600 hover:text-indigo-900 font-medium transition-colors duration-150">
                                                    Editar
                                                </a>
                                                <form action="{{ route('entidades.destroy', $entidad->idEntidad) }}" method="POST" 
                                                      class="inline-block"
                                                      onsubmit="return confirm('¿Estás seguro de querer eliminar esta entidad?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-900 font-medium transition-colors duration-150">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>