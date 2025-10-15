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
                                <button onclick="openCreateModal()"
                                   class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent active:bg-secondary focus:outline-none focus:border-secondary focus:ring ring-secondary/20 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nuevo Objetivo Estratégico
                                </button>
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
                                                <button onclick="openEditModal({{ $objEstrategico->idobjEstrategico }}, '{{ $objEstrategico->fechaRegistro }}', {{ json_encode($objEstrategico->estado) }}, {{ json_encode($objEstrategico->descripcion) }})"
                                                        class="text-neutral hover:text-primary font-medium transition-colors duration-150">
                                                    Editar
                                                </button>
                                                <button onclick="openDeleteModal({{ $objEstrategico->idobjEstrategico }}, {{ json_encode($objEstrategico->descripcion) }})"
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

    {{-- Modales --}}
    @include('objEstrategicos.partials.create-modal')
    @include('objEstrategicos.partials.edit-modal')
    @include('objEstrategicos.partials.delete-modal')

    <script>
        function openCreateModal() {
            document.querySelector('[x-ref="create-objestrategico-modal"]').style.display = 'flex';
        }

        function openEditModal(id, fechaRegistro, estado, descripcion) {
            document.getElementById('edit-objestrategico-form').action = `/objEstrategicos/${id}`;
            document.getElementById('edit_fechaRegistro').value = fechaRegistro;
            document.getElementById('edit_estado').value = estado;
            document.getElementById('edit_descripcion').value = descripcion;
            document.querySelector('[x-ref="edit-objestrategico-modal"]').style.display = 'flex';
        }

        function openDeleteModal(id, descripcion) {
            document.getElementById('delete-objestrategico-form').action = `/objEstrategicos/${id}`;
            document.getElementById('delete-objestrategico-name').textContent = descripcion;
            document.querySelector('[x-ref="delete-objestrategico-modal"]').style.display = 'flex';
        }

        function closeModal(modalRef) {
            document.querySelector(`[x-ref="${modalRef}"]`).style.display = 'none';
        }
    </script>
</x-app-layout>