<x-app-layout>
    @section('title', 'Unidades')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Unidades') }}
        </h2>
    </x-slot>

    {{-- Validacion mensaje --}}
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    {{-- Boton para llamar al formulario crear unidades --}}

    <a href="{{ route('unidades.create') }}">+ Nueva Unidad</a>

    {{-- Tabla para listar todas las unidades --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Macrosector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Sector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Estado</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($unidades as $unidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $unidad->idUnidad }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $unidad->macrosector }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $unidad->sector }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $unidad->estado ? 'Activo' : 'Inactivo' }}</td>

                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{ route('unidades.show', $unidad->idUnidad) }}">Ver</a>
                        <a href="{{ route('unidades.edit', $unidad->idUnidad) }}">Editar</a>
                        <form action="{{ route('unidades.destroy', $unidad->idUnidad) }}" method="POST"
                            onsubmit="return confirm('Estas seguro de querer eliminar estas entidad?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
