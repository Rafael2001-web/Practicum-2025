@extends('layouts.app')

@section('title','Editar Programas')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar los programas</h2>

    {{-- Formulario para edición de programas --}}

        <form action="{{ route ('programas.update' , $programa->idPrograma )}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Entidad</label>
                <select name="idEntidad" required>
                    @foreach($entidades as $entidad)
                        <option value="{{$entidad->idEntidad}}"{{$programa->idEntidad == $entidad->idEntidad?:''}}>
                            {{$entidad->subSector}}
                        </option>
                    @endforeach
                </select>

            </div>

             <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombre" value="{{$programa->nombre}}" required> <br> <br>
            </div>

             <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" value="{{$programa->descripcion}}" required><br><br>
            </div>

            <button type="submit">Actualizar</button>

            <a href="{{route('programas.index')}}">Volver</a>
            
        </form>



@endsection