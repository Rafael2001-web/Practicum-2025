@extends('layouts.app')

@section('title','Editar')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar las Unidades</h2>

    {{-- Formulario para la edicion de unidades --}}

        <form action="{{ route ('unidades.update' , $unidad->idUnidad )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

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

            <button type="submit">Actualizar</button>

            <a href="{{route('unidades.index')}}">Volver</a>
            
        </form>



@endsection