@extends('layouts.app')

@section('title','Nuevo Programa')

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

        {{-- Formulario para la creación de programas --}}

        <form action="{{ route ('programas.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">Entidad</label>
                <select name="idEntidad" required>
                    @foreach($entidades as $entidad)
                        <option value="{{$entidad->idEntidad}}">{{$entidad->subSector}}</option>
                    @endforeach
                </select>

            </div>

             <div>
                <label class="block">Nombre</label>
                <input type="text" name="nombre" require>
            </div>

             <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require>
            </div>

            <button type="submit">Guardar</button>

            <a href="{{route('programas.index')}}">Volver</a>
            
        </form>




@endsection