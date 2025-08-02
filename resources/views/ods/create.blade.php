@extends('layouts.app')

@section('title','Nuevo ODS')

@section('content')
    
    <h2 class="text-2xl font-bold mb-4">Crear Objetivos ODS:</h2>

    @if ($errors->any())
        <div>

            <ul>

                @foreach($errors->all() as $error)

                <li> - {{$error}} </li>

                @endforeach

            </ul>

        </div>
    @endif

        {{-- Formulario para la creación de unidades --}}

        <form action="{{ route ('ods.store')}}" method="POST" class="space-y-4">
            @csrf

            {{--
            <div>
                <label class="block">ID</label>
                <input type="number" name="idOds" require value="{{ old('idOds') }}">
            </div> --}}

            <div>
                <label class="block"># ODS</label>
                <input type="number" name="odsnum" require value="{{ old('odsnum') }}">
            </div>

             <div>
                <label class="block">Nombre ODS</label>
                <input type="text" name="nombre" require value="{{ old('nombre') }}">
            </div>

             <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require value="{{ old('sector') }}">
            </div>

    




            <button type="submit">Guardar</button>

            <a href="{{route('ods.index')}}">Volver</a>
            
        </form>




@endsection