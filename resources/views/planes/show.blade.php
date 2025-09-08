<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20xp;
    }
    h1{
        text-aling: center;
        color: #333333;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1)
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-aling: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #e9e9e9;
    }
    </style>





    <h1>Listado de planes</h1>

    
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

                </tr>
            @endforeach
 
        </tbody>

    </table>

<a href="{{ URL('planes/pdf') }}" target="_blank" ><button style="background-color: #64df64; color: rgb(255, 255, 255);">Generar reporte</button></a>
