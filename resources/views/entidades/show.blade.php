<x-app-layout>
    @section('title', 'Listado de Entidades')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Entidades') }}
        </h2>
    </x-slot>

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => 'Código', 'type' => 'text'],
            ['label' => 'Subsector', 'type' => 'text'],
            ['label' => 'Nivel de Gobierno', 'type' => 'text'],
            ['label' => 'Estado', 'type' => 'badge'],
            ['label' => 'Fecha de Creación', 'type' => 'date'],
            ['label' => 'Fecha de Actualización', 'type' => 'date']
        ]"
        :csv="true"
        :print="true"
        id="entidades-show-table"
        title="Listado de Entidades"
    >
        <x-slot name="buttons">
            <a href="{{ URL('entidades/pdf') }}" target="_blank" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Generar Reporte PDF
            </a>
        </x-slot>

        <tbody>
            @foreach($entidad as $entidad)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->idEntidad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->codigo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->subSector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->nivelGobierno }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if ($entidad->estado == 'activo') bg-green-100 text-green-800
                            @elseif($entidad->estado == 'inactivo') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($entidad->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->fechaCreacion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entidad->fechaActualizacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
