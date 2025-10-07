<x-app-layout>
    @section('title', 'Unidades')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Unidades') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-neutral/20">
                    {{-- Validacion mensaje --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-accent/20 border border-accent/40 text-primary rounded-lg shadow-sm">
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
                                ['label' => 'Macrosector', 'type' => 'text'],
                                ['label' => 'Sector', 'type' => 'text'],
                                ['label' => 'Estado', 'type' => 'badge'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            id="unidades-table"
                            title="Gestión de Unidades"
                        >
                            <x-slot name="buttons">
                                <a href="{{ route('unidades.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent active:bg-secondary focus:outline-none focus:border-secondary focus:ring ring-secondary/20 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nueva Unidad
                                </a>
                            </x-slot>

                            <tbody>
                                @foreach ($unidades as $unidad)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">{{ $unidad->idUnidad }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">{{ $unidad->macrosector }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">{{ $unidad->sector }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $unidad->estado ? 'bg-accent/20 text-primary' : 'bg-red-100 text-red-800' }}">
                                                {{ $unidad->estado ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('unidades.show', $unidad->idUnidad) }}" 
                                                   class="text-secondary hover:text-accent font-medium transition-colors duration-150">
                                                    Ver
                                                </a>
                                                <a href="{{ route('unidades.edit', $unidad->idUnidad) }}" 
                                                   class="text-neutral hover:text-primary font-medium transition-colors duration-150">
                                                    Editar
                                                </a>
                                                <form action="{{ route('unidades.destroy', $unidad->idUnidad) }}" method="POST" 
                                                      class="inline-block"
                                                      onsubmit="return confirm('¿Estás seguro de querer eliminar esta unidad?');">
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
