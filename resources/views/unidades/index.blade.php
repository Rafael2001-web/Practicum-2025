@extends('layouts.app')

@section('title','Unidades')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de unidades:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear unidades --}}

        <a href="{{route('unidades.create')}}">+ Nueva Unidad</a>

    {{-- Tabla para listar todas las unidades --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Macrosector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Sector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Estado</th>
            </tr>
        </thead>
        <tbody>

            @foreach($unidades as $unidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->idUnidad}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->Macrosector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->sector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->estado ? 'Activo' : 'Inactivo'}}</td>

                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('entidades.edit', $unidad->idUnidad)}}">Editar</a>
                        <form action="{{ route('entidades.destroy', $unidad->idUnidad) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar estas entidad?');">
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