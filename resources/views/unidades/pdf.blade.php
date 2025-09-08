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

    
    {{-- Tabla para listar todas las entidades --}}

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

            @foreach($unidad as $unidad)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->idUnidad}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->macrosector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->sector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$unidad->estado ? 'Activo' : 'Inactivo'}}</td>
                    

                </tr>
            @endforeach

         

        </tbody>



    </table>