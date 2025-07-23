@extends('layouts.app')

@section('content')
<div class="container">
    @isset($proyecto)
    <div class="card">
        <div class="card-header">
            <h2>{{ $proyecto->nombre ?? 'Nombre no disponible' }}</h2>
            @isset($proyecto->estado)
            <span class="badge 
                @if($proyecto->estado == 'aprobado') badge-success
                @elseif($proyecto->estado == 'ejecucion') badge-warning
                @elseif($proyecto->estado == 'completado') badge-info
                @else badge-secondary @endif">
                {{ ucfirst($proyecto->estado) }}
            </span>
            @endisset
        </div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $proyecto->codigo ?? 'No especificado' }}</p>
            <p><strong>Sector:</strong> {{ $proyecto->sector ?? 'No especificado' }}</p>
            <p><strong>Descripción:</strong> {{ $proyecto->descripcion ?? 'No disponible' }}</p>
            <p><strong>Período:</strong> 
                @isset($proyecto->fecha_inicio)
                    {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}
                @else
                    Fecha no disponible
                @endisset

                
                - 
                @isset($proyecto->fecha_fin)
                    {{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}
                @else
                    Fecha no disponible
                @endisset
            </p>
            <p><strong>Presupuesto:</strong> ${{ isset($proyecto->presupuesto) ? number_format($proyecto->presupuesto, 2) : '0.00' }}</p>
            <p><strong>Creado por:</strong> {{ $proyecto->user->name ?? 'Usuario no disponible' }}</p>
            <p><strong>Última actualización:</strong> 
                @isset($proyecto->updated_at)
                    {{ $proyecto->updated_at->format('d/m/Y H:i') }}
                @else
                    Fecha no disponible
                @endisset
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-primary">
                Editar
            </a>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">
                Volver al listado
            </a>
        </div>
    </div>
    @else
    <div class="alert alert-danger">
        No se encontró información del proyecto.
    </div>
    @endisset
</div>
@endsection