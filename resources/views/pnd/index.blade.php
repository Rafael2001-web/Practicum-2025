<x-app-layout>
    @section('title', 'PND')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Plan Nacional de Desarrollo') }}
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
                                ['label' => 'EJE', 'type' => 'text'],
                                ['label' => '# Objetivo Nacional', 'type' => 'text'],
                                ['label' => 'Descripción', 'type' => 'text'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            id="pnd-table"
                            title="Gestión del Plan Nacional de Desarrollo"
                        >
                            <x-slot name="buttons">
                                <button onclick="openCreateModal()"
                                   class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent active:bg-secondary focus:outline-none focus:border-secondary focus:ring ring-secondary/20 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nuevo Objetivo PND
                                </button>
                            </x-slot>

                            <tbody>
                                @foreach ($pnd as $pnd)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">{{ $pnd->idPnd }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-semibold">{{ $pnd->eje }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-medium">{{ $pnd->objetivoN }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral/70">{{ Str::limit($pnd->descripcion, 50) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('pnd.show', $pnd->idPnd) }}" 
                                                   class="text-secondary hover:text-accent font-medium transition-colors duration-150">
                                                    Ver
                                                </a>
                                                <button onclick="openEditModal({{ $pnd->idPnd }}, {{ json_encode($pnd->eje) }}, '{{ $pnd->objetivoN }}', {{ json_encode($pnd->descripcion) }})"
                                                        class="text-neutral hover:text-primary font-medium transition-colors duration-150">
                                                    Editar
                                                </button>
                                                <button onclick="openDeleteModal({{ $pnd->idPnd }}, 'Objetivo {{ $pnd->objetivoN }}')"
                                                        class="text-red-600 hover:text-red-900 font-medium transition-colors duration-150">
                                                    <svg class="w-4 h-4 inline mr-1" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
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
    @include('pnd.partials.create-modal')
    @include('pnd.partials.edit-modal')
    @include('pnd.partials.delete-modal')

    <script>
        function openCreateModal() {
            document.querySelector('[x-ref="create-pnd-modal"]').style.display = 'flex';
        }

        function openEditModal(id, eje, objetivoN, descripcion) {
            document.getElementById('edit-pnd-form').action = `/pnd/${id}`;
            document.getElementById('edit_eje').value = eje;
            document.getElementById('edit_objetivoN').value = objetivoN;
            document.getElementById('edit_descripcion').value = descripcion;
            document.querySelector('[x-ref="edit-pnd-modal"]').style.display = 'flex';
        }

        function openDeleteModal(id, objetivo) {
            document.getElementById('delete-pnd-form').action = `/pnd/${id}`;
            document.getElementById('delete-pnd-name').textContent = objetivo;
            document.querySelector('[x-ref="delete-pnd-modal"]').style.display = 'flex';
        }

        function closeModal(modalRef) {
            document.querySelector(`[x-ref="${modalRef}"]`).style.display = 'none';
        }
    </script>
</x-app-layout>
