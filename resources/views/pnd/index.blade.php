<x-app-layout>
    @section('title', 'PND')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Plan Nacional de Desarrollo') }}
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
            ['label' => 'EJE', 'type' => 'text'],
            ['label' => '# Objetivo Nacional', 'type' => 'text'],
            ['label' => 'Descripción', 'type' => 'text'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="pnd-table"
        title="Plan Nacional de Desarrollo"
    >
        <x-slot name="buttons">
            <a href="{{ route('pnd.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                + Nuevo Objetivo PND
            </a>
        </x-slot>

        <tbody>
            @foreach ($pnd as $pnd)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->idPnd }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->eje }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pnd->objetivoN }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($pnd->descripcion, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('pnd.show', $pnd->idPnd) }}" 
                           class="text-color1 hover:text-color2">Ver</a>
                        <a href="{{ route('pnd.edit', $pnd->idPnd) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('pnd.destroy', $pnd->idPnd) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de querer eliminar este Objetivo PND?');">
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
