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
                <th style="border: 1px solid #0933ee; padding: 8px">Id</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Fecha de Registro</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Descripción</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Estado</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>

            </tr>
        </thead>
        <tbody>

            @foreach($objEstrategicos as $objEstrategico)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->idobjEstrategico}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->fechaRegistro}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->descripcion}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->estado}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">
                         <a href="{{ route('objEstrategicos.edit', $objEstrategico->idobjEstrategico) }}">Editar</a>
                        <form action="{{ route('objEstrategicos.destroy', $objEstrategico->idobjEstrategico) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este Objetivo Estratégico?');">
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