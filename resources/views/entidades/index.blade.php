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

    <x-table id="entidadesTable" :headers="[
        ['label' => 'ID', 'type' => 'number'],
        ['label' => 'Código', 'type' => 'text'],
        ['label' => 'Subsector', 'type' => 'text'],
        ['label' => 'Nivel de Gobierno', 'type' => 'text'],
        ['label' => 'Estado', 'type' => 'text'],
        ['label' => 'Fecha de Creación', 'type' => 'date'],
        ['label' => 'Fecha de Actualización', 'type' => 'date'],
        ['label' => 'Acciones', 'type' => 'actions']
    ]" :csv="true" :print="true" :table_void="count($entidades) === 0">
        <x-slot name="buttons">
            <a href="{{ route('entidades.create') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-opacity-90 transition-colors duration-200">
                + Nueva Entidad
            </a>
        </x-slot>
        <tbody>
            @foreach ($entidades as $entidad)
                <tr>
                    <td>{{ $entidad->idEntidad }}</td>
                    <td>{{ $entidad->codigo }}</td>
                    <td>{{ $entidad->subSector }}</td>
                    <td>{{ $entidad->nivelGobierno }}</td>
                    <td>{{ $entidad->estado }}</td>
                    <td>{{ $entidad->fechaCreacion }}</td>
                    <td>{{ $entidad->fechaActualizacion }}</td>
                    <td>
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
    </x-table>
</x-app-layout>