<x-app-layout>
    @section('title', 'Objetivos Estrategicos')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Objetivos Estratégicos') }}
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
                                ['label' => 'Fecha de Registro', 'type' => 'date'],
                                ['label' => 'Descripción', 'type' => 'text'],
                                ['label' => 'Estado', 'type' => 'badge'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            id="objestrategicos-table"
                            title="Gestión de Objetivos Estratégicos"
                        >
                            <x-slot name="buttons">
                                <a href="{{ route('objEstrategicos.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent active:bg-secondary focus:outline-none focus:border-secondary focus:ring ring-secondary/20 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nuevo Objetivo Estratégico
                                </a>
                            </x-slot>

                            <tbody>
                                @foreach ($objEstrategicos as $objEstrategico)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">{{ $objEstrategico->idobjEstrategico }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-medium">{{ $objEstrategico->fechaRegistro }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral/70">{{ Str::limit($objEstrategico->descripcion, 50) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full transition-colors duration-150
                                                @if ($objEstrategico->estado == 'activo') bg-accent/20 text-primary
                                                @elseif($objEstrategico->estado == 'inactivo') bg-red-100 text-red-800
                                                @else bg-neutral/20 text-neutral @endif">
                                                {{ ucfirst($objEstrategico->estado) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('objEstrategicos.show', $objEstrategico->idobjEstrategico) }}" 
                                                   class="text-secondary hover:text-accent font-medium transition-colors duration-150">
                                                    Ver
                                                </a>
                                                <button x-data 
                                                        x-on:click="
                                                            $dispatch('open-modal', 'edit-objestrategico-modal');
                                                            // Llenar los campos del formulario
                                                            document.getElementById('edit-objestrategico-form').action = '{{ route('objEstrategicos.update', $objEstrategico->idobjEstrategico) }}';
                                                            document.getElementById('edit_nombre').value = {{ json_encode($objEstrategico->nombre ?? '') }};
                                                            document.getElementById('edit_fechaRegistro').value = '{{ $objEstrategico->fechaRegistro ?? '' }}';
                                                            document.getElementById('edit_estado').value = {{ json_encode($objEstrategico->estado ?? '') }};
                                                            document.getElementById('edit_descripcion').value = {{ json_encode($objEstrategico->descripcion ?? '') }};
                                                        "
                                                        class="text-neutral hover:text-primary font-medium transition-colors duration-150">
                                                    Editar
                                                </button>
                                                <button x-data 
                                                        x-on:click="
                                                            $dispatch('open-modal', 'delete-objestrategico-modal');
                                                            document.getElementById('delete-objestrategico-form').action = '{{ route('objEstrategicos.destroy', $objEstrategico->idobjEstrategico) }}';
                                                            document.getElementById('delete-objestrategico-name').textContent = {{ json_encode($objEstrategico->nombre ?? '') }};
                                                        "
                                                        class="text-red-600 hover:text-red-900 font-medium transition-colors duration-150">
                                                    Eliminar
                                                </button>
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

    {{-- Delete Modal --}}
    <x-modal name="delete-objestrategico-modal" maxWidth="md">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-primary">
                    Confirmar Eliminación
                </h3>
                <button x-on:click="$dispatch('close-modal', 'delete-objestrategico-modal')"
                    class="text-neutral hover:text-primary transition-colors duration-150">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="mb-6">
                <div class="flex items-center mb-4">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-lg leading-6 font-medium text-primary mb-2">
                        ¿Estás seguro de que deseas eliminar este objetivo estratégico?
                    </h3>
                    <p class="text-sm text-neutral">
                        El objetivo estratégico "<span id="delete-objestrategico-name" class="font-semibold"></span>" será eliminado permanentemente. Esta acción no se puede deshacer.
                    </p>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'delete-objestrategico-modal')">
                    Cancelar
                </x-secondary-button>
                <form id="delete-objestrategico-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">
                        Eliminar Objetivo Estratégico
                    </x-danger-button>
                </form>
            </div>
        </div>
    </x-modal>

    {{-- Edit Modal --}}
    @include('objEstrategicos.edit')
</x-app-layout>