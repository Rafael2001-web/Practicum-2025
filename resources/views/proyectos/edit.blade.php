@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($proyecto) ? 'Editar' : 'Crear' }} Proyecto</h1>

    <form action="{{ isset($proyecto) ? route('proyectos.update', $proyecto) : route('proyectos.store') }}" method="POST">
        @csrf
        @if(isset($proyecto))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Nombre del Proyecto</label>
            <input type="text" name="nombre" class="form-control" 
                   value="{{ old('nombre', $proyecto->nombre ?? '') }}" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $proyecto->descripcion ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Sector</label>
            <select name="sector" class="form-control" required>
                <option value="">Seleccione un sector</option>
                <option value="Salud" {{ (old('sector', $proyecto->sector ?? '') == 'Salud') ? 'selected' : '' }}>Salud</option>
                <option value="Educación" {{ (old('sector', $proyecto->sector ?? '') == 'Educación') ? 'selected' : '' }}>Educación</option>
                <option value="Infraestructura" {{ (old('sector', $proyecto->sector ?? '') == 'Infraestructura') ? 'selected' : '' }}>Infraestructura</option>
                <option value="Ambiente" {{ (old('sector', $proyecto->sector ?? '') == 'Ambiente') ? 'selected' : '' }}>Ambiente</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" 
                           value="{{ old('fecha_inicio',isset($proyecto)
                            ? \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('Y-m-d'): '') }}" required>

                    
                           
                </div>
            </div>
            <div class="col-md-6">
                
                <div class="form-group">
                    <label>Fecha de Fin</label>
                    <input type="date" name="fecha_fin" class="form-control"
                    value="{{ old('fecha_fin',isset($proyecto)
                            ? \Carbon\Carbon::parse($proyecto->fecha_fin)->format('Y-m-d'): '') }}" required>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label>Presupuesto ($)</label>
            <input type="number" name="presupuesto" step="0.01" class="form-control" 
                   value="{{ old('presupuesto', $proyecto->presupuesto ?? '') }}" required>
        </div>

        @if(isset($proyecto))
        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="borrador" {{ $proyecto->estado == 'borrador' ? 'selected' : '' }}>Borrador</option>
                <option value="aprobado" {{ $proyecto->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="ejecucion" {{ $proyecto->estado == 'ejecucion' ? 'selected' : '' }}>En Ejecución</option>
                <option value="completado" {{ $proyecto->estado == 'completado' ? 'selected' : '' }}>Completado</option>
            </select>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">
            {{ isset($proyecto) ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>
</div>
@endsection