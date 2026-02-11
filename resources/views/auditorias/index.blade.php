<x-app-layout>
    @section('title', 'Auditoria del Sistema')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Auditoria del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="bg-white">
                        <x-table
                            :headers="[
                                ['label' => 'Fecha', 'type' => 'date'],
                                ['label' => 'Usuario', 'type' => 'text'],
                                ['label' => 'Modulo', 'type' => 'text'],
                                ['label' => 'Accion', 'type' => 'badge'],
                                ['label' => 'Actividad', 'type' => 'text'],
                                ['label' => 'Proyecto', 'type' => 'text'],
                                ['label' => 'Ruta', 'type' => 'text'],
                                ['label' => 'IP', 'type' => 'text'],
                                ['label' => 'User Agent', 'type' => 'text'],
                                ['label' => 'Detalle', 'type' => 'text']
                            ]"
                            :csv="false"
                            :print="false"
                            :json="false"
                            :excel="false"
                            id="auditorias-table"
                            title="Auditoria del Sistema"
                        >
                            <x-slot name="buttons"></x-slot>

                            <tbody>
                                @forelse ($auditorias as $auditoria)
                                    <tr class="hover:bg-light/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ optional($auditoria->created_at)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral font-medium">
                                            {{ $auditoria->user->name ?? 'Sin usuario' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->modulo ?? 'ACTIVIDADES' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if ($auditoria->accion === 'CREAR') bg-secondary/20 text-primary
                                                @elseif ($auditoria->accion === 'ACTUALIZAR') bg-amber-100 text-amber-800
                                                @elseif (in_array($auditoria->accion, ['INDEX', 'SHOW'], true)) bg-blue-100 text-blue-800
                                                @else bg-red-100 text-red-800 @endif">
                                                {{ $auditoria->accion }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->actividad->nombre ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->actividad->proyecto->nombre ?? 'Sin proyecto' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->ruta ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->ip ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->user_agent ? Str::limit($auditoria->user_agent, 40) : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral">
                                            {{ $auditoria->detalle ?? '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center p-6 text-neutral">
                                            No hay auditorias registradas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
