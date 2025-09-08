@extends('layouts.app')

@section('title','Editar Planes')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar las Planes</h2>

    {{-- Formulario para la edicion de Planes--}}

        <form action="{{ route ('pnd.update' , $pnd->idPnd )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')


            {{--
            <div>
                <label class="block">ID</label>
                <input type="number" name="idPnd" require value="{{ old('idPnd', $pnd->idPnd) }}">
            </div>--}}


            <div class="form-group">
            <label>Eje</label>
            <select name="eje" class="form-control" required>
                <option value="">Seleccione un eje</option>
                <option value="EJE Social" {{ (old('eje', $pnd->eje ?? '') == 'EJE Social') ? 'selected' : '' }}>EJE Social</option>
                <option value="EJE Desarrollo económico" {{ (old('eje', $pnd->eje ?? '') == 'EJE Desarrollo económico') ? 'selected' : '' }}>EJE Desarrollo económico</option>
                <option value="EJE Infraestructura" {{ (old('eje', $pnd->eje ?? '') == 'EJE Infraestructura') ? 'selected' : '' }}>EJE Infraestructura</option>
                <option value="EJE Institucional" {{ (old('eje', $pnd->eje ?? '') == 'EJE Institucional') ? 'selected' : '' }}>EJE Institucional</option>
            </select>
            </div>

            <div>
                <label class="block"># Objetivo Nacional</label>
                <input type="number" name="objetivoN" require value="{{ old('objetivoN', $pnd->objetivoN) }}">
            </div>

            <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require value="{{ old('descripcion', $pnd->descripcion) }}">
            </div>

            <button type="submit">Actualizar</button>

            <a href="{{route('pnd.index')}}">Volver</a>
            
        </form>



@endsection