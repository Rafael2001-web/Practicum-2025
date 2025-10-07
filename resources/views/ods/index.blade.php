<x-app-layout>
    @section('title', 'ODS')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Objetivos ODS') }}
        </h2>
    </x-slot>

    {{-- Validacion mensaje --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <x-table 
        :headers="[
            ['label' => 'ID', 'type' => 'text'],
            ['label' => '# ODS', 'type' => 'text'],
            ['label' => 'Nombre ODS', 'type' => 'text'],
            ['label' => 'Descripción', 'type' => 'text'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="ods-table"
        title="Objetivos ODS"
    >
        <x-slot name="buttons">
            <a href="{{ route('ods.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                + Nuevo Objetivo ODS
            </a>
        </x-slot>

        <tbody>
            @foreach ($ods as $ods)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ods->idOds }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ods->odsnum }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ods->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($ods->descripcion, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('ods.edit', $ods->idOds) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('ods.destroy', $ods->idOds) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de querer eliminar este Objetivo ODS?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
