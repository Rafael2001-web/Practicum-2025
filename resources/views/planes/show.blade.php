<x-app-layout>
    @section('title', 'Listado de Planes')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Planes') }}
        </h2>
    </x-slot>

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => 'Código', 'type' => 'text'],
            ['label' => 'Nombre', 'type' => 'text'],
            ['label' => 'Entidad', 'type' => 'text'],
            ['label' => 'Presupuesto', 'type' => 'currency'],
            ['label' => 'Fecha Inicio', 'type' => 'date'],
            ['label' => 'Fecha Fin', 'type' => 'date'],
            ['label' => 'Estado', 'type' => 'badge']
        ]"
        :csv="true"
        :print="true"
        id="planes-show-table"
        title="Listado de Planes"
    >
        <x-slot name="buttons">
            <a href="{{ URL('planes/pdf') }}" target="_blank" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Generar Reporte PDF
            </a>
        </x-slot>

        <tbody>
            @foreach($planes as $plan)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->idPlan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->codigo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->entidad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($plan->presupuesto, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->fecha_inicio }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plan->fecha_fin }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if ($plan->estado == 'activo') bg-green-100 text-green-800
                            @elseif($plan->estado == 'inactivo') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($plan->estado) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
