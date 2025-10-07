<x-app-layout>
    @section('title', 'Objetivos Estratégicos')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Objetivos Estratégicos') }}
        </h2>
    </x-slot>

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => 'Fecha de Registro', 'type' => 'date'],
            ['label' => 'Descripción', 'type' => 'text'],
            ['label' => 'Estado', 'type' => 'badge']
        ]"
        :csv="true"
        :print="true"
        id="objestrategicos-show-table"
        title="Listado de Objetivos Estratégicos"
    >
        <x-slot name="buttons">
            <a href="{{ URL('objEstrategicos/pdf') }}" target="_blank" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Generar Reporte PDF
            </a>
        </x-slot>

        <tbody>
            @foreach($objEstrategicos as $objEstrategico)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $objEstrategico->idobjEstrategico }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $objEstrategico->fechaRegistro }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $objEstrategico->descripcion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if ($objEstrategico->estado == 'activo') bg-green-100 text-green-800
                            @elseif($objEstrategico->estado == 'inactivo') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($objEstrategico->estado) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
