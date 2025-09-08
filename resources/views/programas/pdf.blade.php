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





    <h1>Listado de programas</h1>

    
    {{-- Tabla para listar todos los programas --}}

    <table style="background-color: #ccc;">

        <thead>
            <tr>
                <th style="border: 1px solid #1506e4; padding: 8px">ID</th>
                <th style="border: 1px solid #1506e4; padding: 8px">Entidad</th>
                <th style="border: 1px solid #1506e4; padding: 8px">Nombre</th>
                <th style="border: 1px solid #1506e4; padding: 8px">Descripción</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($programa as $programa)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->idPrograma}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->entidad->subSector}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->nombre}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$programa->descripcion}}</td>
                    
                    
                </tr>
            @endforeach

         

        </tbody>



    </table>