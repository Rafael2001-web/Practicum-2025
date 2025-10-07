<x-app-layout>
    @section('title', 'Objetivos Estrategicos')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Objetivos Estratégicos') }}
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
            ['label' => 'Fecha de Registro', 'type' => 'date'],
            ['label' => 'Descripción', 'type' => 'text'],
            ['label' => 'Estado', 'type' => 'badge'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="objestrategicos-table"
        title="Objetivos Estratégicos"
    >
        <x-slot name="buttons">
            <a href="{{ route('objEstrategicos.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                + Nuevo Objetivo Estratégico
            </a>
        </x-slot>

        <tbody>
            @foreach ($objEstrategicos as $objEstrategico)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $objEstrategico->idobjEstrategico }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $objEstrategico->fechaRegistro }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($objEstrategico->descripcion, 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if ($objEstrategico->estado == 'activo') bg-green-100 text-green-800
                            @elseif($objEstrategico->estado == 'inactivo') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($objEstrategico->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('objEstrategicos.show', $objEstrategico->idobjEstrategico) }}" 
                           class="text-color1 hover:text-color2">Ver</a>
                        <a href="{{ route('objEstrategicos.edit', $objEstrategico->idobjEstrategico) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('objEstrategicos.destroy', $objEstrategico->idobjEstrategico) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de querer eliminar este Objetivo Estratégico?');">
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