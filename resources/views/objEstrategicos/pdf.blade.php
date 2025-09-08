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





    <h1>Listado de Objetivos Estratégicos</h1>

    
    {{-- Tabla para listar todos los Objetivos Estratégicos --}}

    <table style="background-color: #f8f8fa;">

        <thead>
            <tr>
                <th style="border: 1px solid #0933ee; padding: 8px">Id</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Fecha de Registro</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Descripción</th>
                <th style="border: 1px solid #0933ee; padding: 8px">Estado</th>

            </tr>
        </thead>
        <tbody>

            @foreach($objEstrategicos as $objEstrategico)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->idobjEstrategico}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->fechaRegistro}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->descripcion}}</td>
                    <td style="border: 1px solid #ccc; padding: 8px">{{$objEstrategico->estado}}</td>
                    

                </tr>
            @endforeach

         

        </tbody>



    </table>