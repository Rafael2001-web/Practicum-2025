<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Entidades') }}
        </h2>
    </x-slot>
    <form action="{{ route('entidades.update', $entidad->idEntidad) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Código</label>
            <input type="number" name="codigo" require value="{{ old('codigo', $entidad->codigo) }}">
        </div>

        <div>
            <label class="block">Subsector</label>
            <input type="text" name="subSector" require value="{{ old('subSector', $entidad->subSector) }}">
        </div>

        <div>
            <label class="block">Nivel de Gobierno</label>
            <input type="text" name="nivelGobierno" require
                value="{{ old('nivelGobierno', $entidad->nivelGobierno) }}">
        </div>

        <div>
            <label class="block">Estado</label>
            <input type="text" name="estado" require value="{{ old('estado', $entidad->estado) }}">
        </div>

        <div>
            <label class="block">Fecha de Creación</label>
            <input type="date" name="fechaCreacion" require
                value="{{ old('fechaCreacion', $entidad->fechaCreacion) }}">
        </div>

        <div>
            <label class="block">Fecha de Actualización</label>
            <input type="date" name="fechaActualizacion" require
                value="{{ old('fechaActualizacion', $entidad->fechaActualizacion) }}">
        </div>

        <button type="submit">Actualizar</button>

        <a href="{{ route('entidades.index') }}">Volver</a>

    </form>
</x-app-layout>
