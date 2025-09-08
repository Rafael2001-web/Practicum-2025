@extends('layouts.app')

@section('title','Planes')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Planes:</h2>

    {{-- Validacion mensaje --}}
        @if (session('success'))
            <div>
                {{session('success')}}
            </div>
        @endif

    {{--Boton para llamar al formulario crear Planes --}}

        <a href="{{route('planes.create')}}">+ Nuevo Plan</a>

    {{-- Tabla para listar todas los Planes --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Código</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Nombre</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Entidad</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Presupuesto</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha Inicio</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha Fin</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Estado</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($planes as $plan)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->idPlan}}</td>
                   
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->codigo}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->nombre}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->entidad}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->presupuesto}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->fecha_inicio}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->fecha_fin}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$plan->estado}}</td>


                    <td style="border: 1px solid #ccc; padding: 8px">
                        <a href="{{route('planes.show', $plan->idPlan)}}">Ver</a>
                        <a href="{{route('planes.edit', $plan->idPlan)}}">Editar</a>
                        <form action="{{ route('planes.destroy', $plan->idPlan) }}" method="POST" onsubmit="return confirm('Estas seguro de querer eliminar este Plan?');">
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