@extends('layouts.app')

@section('title','Objetivos Estrategicos')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Objetivos Estratégicos:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear Objetivos Estratégicos --}}

        <a href="{{route('objEstrategicos.create')}}">+ Nuevo Objetivo Estratégico</a>

    {{-- Tabla para listar todos los Objetivos Estratégicos --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #0933ee; padding: 8px">ID</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Descripcion</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Fecha</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Estado</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($programas as $programa)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->idPrograma}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->entidad->subSector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->nombre}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->descripcion}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('programas.edit', $programa->idPrograma)}}">Editar</a>
                        <form action="{{ route('programas.destroy', $programa->idPrograma) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este programa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                        </td>
                    


                </tr>
            @endforeach

         

        </tbody>



    </table>



@endsection