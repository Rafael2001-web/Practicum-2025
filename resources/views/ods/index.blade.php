@extends('layouts.app')

@section('title','ODS')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Objetivos ODS:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear ODS --}}

        <a href="{{route('ods.create')}}">+ Nuevo Objetivo ODS</a>

    {{-- Tabla para listar todas los ODS --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px"># ODS</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Nombre ODS</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Descripcion</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($ods as $ods)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$ods->idOds}}</td>
                   
                    <td style="border: 1px solid #ccc; padding: 8px">{{$ods->odsnum}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$ods->nombre }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$ods->descripcion }}</td>

                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('ods.edit', $ods->idOds)}}">Editar</a>
                        <form action="{{ route('ods.destroy', $ods->idOds) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este Objetivo ODS?');">
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