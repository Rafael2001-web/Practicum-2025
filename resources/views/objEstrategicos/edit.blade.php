@extends('layouts.app')

@section('title','Editar')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar las Entidades</h2>

    {{-- Formulario para editar los Objetivos Estrégicos --}}
        <form action="{{ route ('objEstrategicos.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">ID</label>
                <input type="number" name="idobjEstrategico" require value="{{ old('idobjEstrategico') }}">
            </div>


            <div>
                <label class="block">Fecha de Registro</label>
                <input type="date" name="fechaRegistro" require value="{{ old('fechaRegistro') }}">
            </div>

            <div>
                <label class="block">Descripción</label>
                <input type="text" name="Descripción" require value="{{ old('descripcion') }}">
            </div>

            <div>
                <label class="block">Estado</label>
                <input type="text" name="estado" require value="{{ old('estado') }}">
            </div>

            <button type="submit">Guardar</button>

            <a href="{{route('entidades.index')}}">Volver</a>
            
        </form>




@endsection