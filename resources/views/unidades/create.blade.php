@extends('layouts.app')

@section('title','Nueva Unidad')

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

        {{-- Formulario para la creación de unidades --}}

        <form action="{{ route ('unidades.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">ID</label>
                <input type="number" name="ID" require value="{{ old('idUnidad') }}">
            </div>

             <div>
                <label class="block">Macrosector</label>
                <input type="text" name="Macrosector" require value="{{ old('macrosector') }}">
            </div>

             <div>
                <label class="block">Sector</label>
                <input type="text" name="Sector" require value="{{ old('sector') }}">
            </div>

            <div>
                <label class="block">Estado</label>
                <input type="text" name="estado" require value="{{ old('estado') }}">
            </div>



            <button type="submit">Guardar</button>

            <a href="{{route('unidades.index')}}">Volver</a>
            
        </form>




@endsection