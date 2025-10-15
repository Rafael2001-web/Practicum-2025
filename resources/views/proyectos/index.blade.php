<x-app-layout>
    @section('title', 'Proyectos de Inversión')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Proyectos de Inversión') }}
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
                                ['label' => 'Código', 'type' => 'text'],
                                ['label' => 'Nombre', 'type' => 'text'],
                                ['label' => 'Sector', 'type' => 'text'],
                                ['label' => 'Presupuesto', 'type' => 'currency'],
                                ['label' => 'Estado', 'type' => 'badge'],
                                ['label' => 'Acciones', 'type' => 'actions']
                            ]"
                            :csv="true"
                            :print="true"
                            id="proyectos-table"
                            title="Gestión de Proyectos de Inversión"
                        >
                            <x-slot name="buttons">
                                <button onclick="openCreateModal()"
                                   class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent active:bg-secondary focus:outline-none focus:border-secondary focus:ring ring-secondary/20 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nuevo Proyecto
                                </button>
                            </x-slot>

                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">{{ $proyecto->codigo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-medium">{{ $proyecto->nombre }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">{{ $proyecto->sector }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-semibold">${{ number_format($proyecto->presupuesto, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full transition-colors duration-150
                                                @if ($proyecto->estado == 'aprobado') bg-accent/20 text-primary
                                                @elseif($proyecto->estado == 'En Ejecución') bg-amber-100 text-amber-800
                                                @elseif($proyecto->estado == 'completado') bg-secondary/20 text-primary
                                                @else bg-neutral/20 text-neutral @endif">
                                                {{ ucfirst($proyecto->estado) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('proyectos.show', $proyecto) }}" 
                                                   class="text-secondary hover:text-accent font-medium transition-colors duration-150">
                                                   <svg class="w-4 h-4 inline mr-1" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg> 
                                                   Ver
                                                </a>
                                                <button onclick="openEditModal({{ $proyecto->id }}, {{ json_encode($proyecto->codigo) }}, {{ json_encode($proyecto->nombre) }}, {{ json_encode($proyecto->descripcion) }}, {{ json_encode($proyecto->sector) }}, '{{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('Y-m-d') }}', '{{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('Y-m-d') }}', '{{ $proyecto->presupuesto }}', {{ json_encode($proyecto->estado) }}, '{{ $proyecto->user_id }}')"
                                                        class="text-neutral hover:text-primary font-medium transition-colors duration-150">
                                                    <svg class="w-4 h-4 inline mr-1" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                        Editar
                                                </button>
                                                <button onclick="openDeleteModal({{ $proyecto->id }}, {{ json_encode($proyecto->nombre) }})"
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
    @include('proyectos.partials.create-modal')
    @include('proyectos.partials.edit-modal')
    @include('proyectos.partials.delete-modal')

    <script>
        function openCreateModal() {
            document.querySelector('[x-ref="create-proyecto-modal"]').style.display = 'flex';
        }

        function openEditModal(id, codigo, nombre, descripcion, sector, fechaInicio, fechaFin, presupuesto, estado, userId) {
            document.getElementById('edit-proyecto-form').action = `/proyectos/${id}`;
            document.getElementById('edit_codigo').value = codigo;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_descripcion').value = descripcion;
            document.getElementById('edit_sector').value = sector;
            document.getElementById('edit_fecha_inicio').value = fechaInicio;
            document.getElementById('edit_fecha_fin').value = fechaFin;
            document.getElementById('edit_presupuesto').value = presupuesto;
            document.getElementById('edit_estado').value = estado;
            document.getElementById('edit_user_id').value = userId;
            document.querySelector('[x-ref="edit-proyecto-modal"]').style.display = 'flex';
        }

        function openDeleteModal(id, nombre) {
            document.getElementById('delete-proyecto-form').action = `/proyectos/${id}`;
            document.getElementById('delete-proyecto-name').textContent = nombre;
            document.querySelector('[x-ref="delete-proyecto-modal"]').style.display = 'flex';
        }

        function closeModal(modalRef) {
            document.querySelector(`[x-ref="${modalRef}"]`).style.display = 'none';
        }
    </script>
</x-app-layout>
