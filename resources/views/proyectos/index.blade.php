<x-app-layout>
    @section('title', 'Proyectos de Inversión')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Proyectos de Inversión') }}
        </h2>
    </x-slot>

    {{-- Validacion mensaje --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1>Proyectos de Inversión</h1>

        <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">
            Nuevo Proyecto
        </a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Sector</th>
                        <th>Presupuesto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{ $proyecto->codigo }}</td>
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->sector }}</td>
                            <td>${{ number_format($proyecto->presupuesto, 2) }}</td>
                            <td>
                                <span
                                    class="badge 
                            @if ($proyecto->estado == 'aprobado') badge-success
                            @elseif($proyecto->estado == 'ejecucion') badge-warning
                            @elseif($proyecto->estado == 'completado') badge-info
                            @else badge-secondary @endif">
                                    {{ ucfirst($proyecto->estado) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-sm btn-info">
                                    Ver
                                </a>
                                <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                                <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar este proyecto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $proyectos->links() }}
    </div>
</x-app-layout>
