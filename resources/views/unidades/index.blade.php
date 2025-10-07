<x-app-layout>
    @section('title', 'Unidades')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Unidades') }}
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
            ['label' => 'Macrosector', 'type' => 'text'],
            ['label' => 'Sector', 'type' => 'text'],
            ['label' => 'Estado', 'type' => 'text'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="unidades-table"
        title="Listado de Unidades"
    >
        <x-slot name="buttons">
            <a href="{{ route('unidades.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                + Nueva Unidad
            </a>
        </x-slot>

        <tbody>
            @foreach ($unidades as $unidad)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->idUnidad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->macrosector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $unidad->sector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $unidad->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $unidad->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('unidades.show', $unidad->idUnidad) }}" 
                           class="text-color1 hover:text-color2">Ver</a>
                        <a href="{{ route('unidades.edit', $unidad->idUnidad) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('unidades.destroy', $unidad->idUnidad) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de querer eliminar esta unidad?');">
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
