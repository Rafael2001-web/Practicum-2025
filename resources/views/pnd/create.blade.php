@extends('layouts.app')

@section('title','Nuevo PND')

@section('content')
    
    @if ($errors->any())
        <div>

            <ul>

                @foreach($errors->all() as $error)

                <li> - {{$error}} </li>

                @endforeach

            </ul>

        </div>
    @endif

        {{-- Formulario para la creación de PND --}}

        <form action="{{ route ('pnd.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">ID</label>
                <input type="number" name="idPnd" require value="{{ old('idPnd') }}">
            </div>

            <div>
                <label class="block">Eje2</label>
                <input type="text" name="eje" require value="{{ old('eje') }}">
            </div>

            <div class="form-group">
            <label>Eje</label>
            <select name="eje" class="form-control" required>
                <option value="">Seleccione un eje</option>
                <option value="EJE Social" {{ (old('eje',  '') == 'EJE Social') ? 'selected' : '' }}>EJE Social</option>
                <option value="EJE Desarrollo económico" {{ (old('eje', '') == 'EJE Desarrollo económico') ? 'selected' : '' }}>EJE Desarrollo económico</option>
                <option value="EJE Infraestructura" {{ (old('eje', '') == 'EJE Infraestructura') ? 'selected' : '' }}>EJE Infraestructura</option>
                <option value="EJE Institucional" {{ (old('eje',  '') == 'EJE Institucional') ? 'selected' : '' }}>EJE Institucional</option>
            </select>
        </div>

            <div>
                <label class="block"># Objetivo Nacional</label>
                <input type="number" name="objetivoN" require value="{{ old('objetivoN') }}">
            </div>

            <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require value="{{ old('sector') }}">
            </div>

    




            <button type="submit">Guardar</button>

            <a href="{{route('pnd.index')}}">Volver</a>
            
        </form>




@endsection