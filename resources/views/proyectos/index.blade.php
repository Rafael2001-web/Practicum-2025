<x-app-layout>
    @section('title', 'Proyectos de Inversión')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Proyectos de Inversión') }}
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
            ['label' => 'Código', 'type' => 'text'],
            ['label' => 'Nombre', 'type' => 'text'],
            ['label' => 'Sector', 'type' => 'text'],
            ['label' => 'Presupuesto', 'type' => 'currency'],
            ['label' => 'Estado', 'type' => 'badge'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="proyectos-table"
        title="Proyectos de Inversión"
    >
        <x-slot name="buttons">
            <a href="{{ route('proyectos.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                Nuevo Proyecto
            </a>
        </x-slot>

        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proyecto->codigo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proyecto->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proyecto->sector }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($proyecto->presupuesto, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if ($proyecto->estado == 'aprobado') bg-green-100 text-green-800
                            @elseif($proyecto->estado == 'ejecucion') bg-yellow-100 text-yellow-800
                            @elseif($proyecto->estado == 'completado') bg-blue-100 text-blue-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($proyecto->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('proyectos.show', $proyecto) }}" 
                           class="text-color1 hover:text-color2">Ver</a>
                        <a href="{{ route('proyectos.edit', $proyecto) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Eliminar este proyecto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>

    <div class="mt-6">
        {{ $proyectos->links() }}
    </div>
</x-app-layout>
