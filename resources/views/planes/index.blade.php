<x-app-layout>
    @section('title','Planes')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Planes') }}
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
            ['label' => 'Código', 'type' => 'text'],
            ['label' => 'Nombre', 'type' => 'text'],
            ['label' => 'Entidad', 'type' => 'text'],
            ['label' => 'Presupuesto', 'type' => 'currency'],
            ['label' => 'Fecha Inicio', 'type' => 'date'],
            ['label' => 'Fecha Fin', 'type' => 'date'],
            ['label' => 'Estado', 'type' => 'badge'],
            ['label' => 'Acciones', 'type' => 'actions']
        ]"
        :csv="true"
        :print="true"
        id="planes-table"
        title="Planes"
    >
        <x-slot name="buttons">
            <a href="{{ route('planes.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color1 focus:outline-none focus:border-color1 focus:ring ring-color1 disabled:opacity-25 transition ease-in-out duration-150">
                + Nuevo Plan
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
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('planes.show', $plan->idPlan) }}" 
                           class="text-color1 hover:text-color2">Ver</a>
                        <a href="{{ route('planes.edit', $plan->idPlan) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('planes.destroy', $plan->idPlan) }}" method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de querer eliminar este Plan?');">
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