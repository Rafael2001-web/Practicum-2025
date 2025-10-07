<x-app-layout>
    @section('title', 'Listado de Unidades')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Unidades') }}
        </h2>
    </x-slot>

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => 'Macrosector', 'type' => 'text'],
            ['label' => 'Sector', 'type' => 'text'],
            ['label' => 'Estado', 'type' => 'text']
        ]"
        :csv="true"
        :print="true"
        id="unidades-show-table"
        title="Listado de Unidades"
    >
        <x-slot name="buttons">
            <a href="{{ URL('unidades/pdf') }}" target="_blank" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Generar Reporte PDF
            </a>
        </x-slot>

        <tbody>
            @foreach($unidades as $unidad)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->idUnidad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->macrosector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->sector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $unidad->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $unidad->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
