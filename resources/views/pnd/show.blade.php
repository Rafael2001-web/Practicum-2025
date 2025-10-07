<x-app-layout>
    @section('title', 'Objetivos PND')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listado de Objetivos PND') }}
        </h2>
    </x-slot>

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => 'EJE', 'type' => 'text'],
            ['label' => '# Objetivo Nacional', 'type' => 'text'],
            ['label' => 'Descripción', 'type' => 'text']
        ]"
        :csv="true"
        :print="true"
        id="pnd-show-table"
        title="Listado de Objetivos PND"
    >
        <x-slot name="buttons">
            <a href="{{ URL('pnd/pdf') }}" target="_blank" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Generar Reporte PDF
            </a>
        </x-slot>

        <tbody>
            @foreach($pnd as $pnd)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->idPnd }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->eje }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->objetivoN }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pnd->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
