@extends('layouts.app')

@section('title','PND')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Objetivos PND:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear PND --}}

        <a href="{{route('pnd.create')}}">+ Nuevo Objetivo PND</a>

    {{-- Tabla para listar todas los PND --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">EJE</th>

                <th style="border: 1px solid #4550eb; padding: 8px"># Objetivo Nacional</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Descripcion</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pnd as $pnd)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->idPnd}}</td>
                   
                   
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->eje}}</td>



                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->objetivoN }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->descripcion }}</td>

                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('pnd.edit', $pnd->idPnd)}}">Editar</a>
                        <form action="{{ route('pnd.destroy', $pnd->idPnd) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este Objetivo PND?');">
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