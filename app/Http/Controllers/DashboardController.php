<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $numEntidades = \App\Models\Entidad::count();
        $numUsuarios = \App\Models\User::count();
        $numProgramas = \App\Models\Programa::count();
        $numProyectos = \App\Models\Proyecto::count();
        $actividadesTotal = Actividad::where('activo', true)->count();
        $actividadesEnRiesgo = Actividad::where('activo', true)
            ->where('estado_reportado', 'EN_RIESGO')
            ->count();
        $actividadesCompletadas = Actividad::where('activo', true)
            ->where('estado_reportado', 'COMPLETADA')
            ->count();
        $actividadesNoIniciadas = Actividad::where('activo', true)
            ->where('estado_reportado', 'NO_INICIADA')
            ->count();
        $avancePromedio = Actividad::where('activo', true)->avg('avance_real');

        return view('dashboard', compact(
            'numEntidades',
            'numUsuarios',
            'numProgramas',
            'numProyectos',
            'actividadesTotal',
            'actividadesEnRiesgo',
            'actividadesCompletadas',
            'actividadesNoIniciadas',
            'avancePromedio'
        ));
    }
}
