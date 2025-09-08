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





    <h1>Listado de entidades</h1>

    
    {{-- Tabla para listar todas los PND --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #4550eb; padding: 8px">ID</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Código</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Subsector</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Nivel de Gobierno</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Estado</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha de Creación</th>
                <th style="border: 1px solid #4550eb; padding: 8px">Fecha de Actualización</th>
            
            </tr>
        </thead>
        <tbody>

            @foreach($entidad as $entidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->idEntidad}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->codigo}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->subSector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->nivelGobierno}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->estado}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->fechaCreacion}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$entidad->fechaActualizacion}}</td>
                   

                </tr>
            @endforeach

         

        </tbody>



    </table>

<a href="{{ URL('entidades/pdf') }}" target="_blank" ><button style="background-color: #64df64; color: rgb(255, 255, 255);">Generar reporte</button></a>
