<x-app-layout>

    @section('title', 'Entidades')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Entidades') }}
        </h2>
    </x-slot>

    {{-- Validacion mensaje --}}
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    {{-- Boton para llamar al formulario crear entidades --}}

    <a href="{{ route('entidades.create') }}">+ Nueva Entidad</a>

    {{-- Tabla para listar todas las entidades --}}

    <table style="background-color: #f8f8fa;">
        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Código</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Subsector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Nivel de Gobierno</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Estado</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha de Creación</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha de Actualización</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($entidades as $entidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->idEntidad }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->codigo }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->subSector }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->nivelGobierno }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->estado }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->fechaCreacion }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{ $entidad->fechaActualizacion }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{ route('entidades.show', $entidad->idEntidad) }}">Ver</a>
                        <a href="{{ route('entidades.edit', $entidad->idEntidad) }}">Editar</a>
                        <form action="{{ route('entidades.destroy', $entidad->idEntidad) }}" method="POST"
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