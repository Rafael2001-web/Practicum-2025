<x-app-layout>
@section('title','Editar Planes')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Planes') }}
        </h2>
    </x-slot>

    {{-- Formulario para la edicion de PND --}}

        <form action="{{ route ('planes.update' , $plan->idPlan )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
         

            <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombre" require value="{{ old('nombre', $plan->nombre) }}">
            </div>

             <div>
                <label class="block">Entidad</label>
                <input type="text" name="entidad" require value="{{ old('entidad', $plan->entidad) }}">
            </div>

            <div>
                <label>Presupuesto ($)</label>
                <input type="number" name="presupuesto" step="0.01" require value="{{ old('presupuesto', $plan->presupuesto) }}">
            </div>
             
                
             <div>
                <label class="block">Fecha Inicial</label>
                <input type="date" name="fecha_inicio" require value="{{ old('fecha_inicio', $plan->fecha_inicio) }}">
            </div>

             <div>
                <label class="block">Fecha Final</label>
                <input type="date" name="fecha_fin" require value="{{ old('fecha_fin', $plan->fecha_fin) }}">
            </div>

            <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="">Seleccione el estado</option>
                <option value="Borrador" {{ (old('estado', $plan->estado) == 'Borrador') ? 'selected' : '' }}>Borrador</option>
                <option value="En Revision" {{ (old('estado', $plan->estado) == 'En Revision') ? 'selected' : '' }}>En Revisión</option>
                <option value="Aprobado" {{ (old('estado', $plan->estado) == 'Aprobado') ? 'selected' : '' }}>Aprobado</option>
                 <option value="Rechazado" {{ (old('estado', $plan->estado) == 'Rechazado') ? 'selected' : '' }}>Rechazado</option>
            </select>
            </div>

            <button type="submit">Actualizar</button>

            <a href="{{route('planes.index')}}">Volver</a>
            
        </form>
<x-app-layout