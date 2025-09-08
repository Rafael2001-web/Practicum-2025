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


<h1 class="text-2xl font-bold mb-4">Listado de Objetivos PND:</h1>

    {{-- Tabla para listar todas los PND --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">EJE</th>
                <th style="border: 1px solid #4550eb; padding: 8px"># Objetivo Nacional</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Descripcion</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pnd as $pnd)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->idPnd}}</td>                  
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->eje}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->objetivoN }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$pnd->descripcion }}</td>
                    

                </tr>
            @endforeach

         

        </tbody>

    </table>

<a href="{{ URL('pnd/pdf') }}" target="_blank" ><button style="background-color: #64df64; color: rgb(255, 255, 255);">Generar reporte</button></a>
