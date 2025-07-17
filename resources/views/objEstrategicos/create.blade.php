@extends('layouts.app')

@section('title','Nuevo Objetivo Estrégico')

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

        {{-- Formulario para la creación de Objetivos Estrégicos--}}

        <form action="{{ route ('objEstrategicos.store')}}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">Objetivo Estratégico</label>
                <select name="idObjEstrategico" required>
                    @foreach($objEstrategicos as $objEstrategico)
                        <option value="{{$Objestrategico->idObjestrategico}}"></option>
                    @endforeach
                </select>

            </div>

             <div>
                <label class="block">Descripción</label>
                <input type="text" name="descripcion" require>
            </div>

            <button type="submit">Guardar</button>

            <a href="{{route('programas.index')}}">Volver</a>
            
        </form>




@endsection