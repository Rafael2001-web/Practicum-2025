@extends('layouts.app')

@section('title','Editar')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar Objetivos ODS</h2>

    {{-- Formulario para la edicion de unidades --}}

        <form action="{{ route ('ods.update' , $ods->idOds )}}" method="POST" class="space-y-4">

        
            @csrf
            @method('PUT')


            {{--
           <div>
                <label class="block">ID</label>
                <input type="number" name="idOds" require value="{{ old('idOds', $ods->idOds) }}">
            </div> --}}
        
            <div>
                <label class="block"># ODS</label>
                <input type="number" name="odsnum" require value="{{ old('odsnum', $ods->odsnum) }}">
            </div>

             <div>
                <label class="block">Nombre ODS</label>
                <input type="text" name="nombre" require value="{{ old('nombre', $ods->nombre) }}">
            </div>

             <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require value="{{ old('sector', $ods->descripcion) }}">
            </div>

            <button type="submit">Actualizar</button>

            <a href="{{route('ods.index')}}">Volver</a>
            
        </form>



@endsection