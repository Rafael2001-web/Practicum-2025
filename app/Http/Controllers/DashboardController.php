<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\objEstrategico;
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
        $actividadesEnRiesgoLista = Actividad::with('proyecto')
            ->where('activo', true)
            ->where('estado_reportado', 'EN_RIESGO')
            ->orderByDesc('variacion_tiempo_dias')
            ->limit(5)
            ->get();

        $objetivosIndicadores = $this->calcularIndicadoresObjetivos();
        $objetivosRegla3 = $objetivosIndicadores
            ->filter(fn ($objetivo) => $objetivo['regla3_aplica'])
            ->values();

        return view('dashboard', compact(
            'numEntidades',
            'numUsuarios',
            'numProgramas',
            'numProyectos',
            'actividadesTotal',
            'actividadesEnRiesgo',
            'actividadesCompletadas',
            'actividadesNoIniciadas',
            'avancePromedio',
            'actividadesEnRiesgoLista',
            'objetivosIndicadores',
            'objetivosRegla3'
        ));
    }

    private function calcularIndicadoresObjetivos()
    {
        $objetivos = objEstrategico::with(['actividades' => function ($query) {
            $query->where('activo', true);
        }])->get();

        return $objetivos->map(function ($objetivo) {
            $actividades = $objetivo->actividades;
            $totalActividades = $actividades->count();

            $avancePlan = $actividades->avg('avance_planificado');
            $avanceReal = $actividades->avg('avance_real');
            $indicadorAvance = null;
            if ($avancePlan !== null && $avancePlan > 0 && $avanceReal !== null) {
                $indicadorAvance = ($avanceReal / $avancePlan) * 100;
            }

            $variacionTiempo = $actividades->avg('variacion_tiempo_dias');

            $indicador1 = $this->estadoIndicadorAvance($avancePlan, $avanceReal, $indicadorAvance);
            $indicador2 = $this->estadoIndicadorTiempo($variacionTiempo, $totalActividades);
            $indicador3 = $this->estadoIndicadorCumplimiento($actividades);

            $indicadores = [$indicador1, $indicador2, $indicador3];
            $cumplimientoAnd = $this->estadoCumplimientoAnd($indicadores);
            $cumplimientoOr = $this->estadoCumplimientoOr($indicadores);
            $regla3Aplica = !in_array('CUMPLIDO', $indicadores, true) && in_array('NO_CUMPLIDO', $indicadores, true);

            return [
                'id' => $objetivo->idobjEstrategico,
                'descripcion' => $objetivo->descripcion,
                'total_actividades' => $totalActividades,
                'indicador_avance' => $indicadorAvance,
                'variacion_tiempo' => $variacionTiempo,
                'indicador1' => $indicador1,
                'indicador2' => $indicador2,
                'indicador3' => $indicador3,
                'cumplimiento_and' => $cumplimientoAnd,
                'cumplimiento_or' => $cumplimientoOr,
                'regla3_aplica' => $regla3Aplica
            ];
        });
    }

    private function estadoIndicadorAvance($avancePlan, $avanceReal, $indicadorAvance): string
    {
        if ($avanceReal === null || $avanceReal <= 0) {
            return 'NO_INICIADO';
        }
        if ($avancePlan !== null && $avancePlan > 0 && $indicadorAvance !== null && $indicadorAvance >= 100) {
            return 'CUMPLIDO';
        }
        return 'EN_PROGRESO';
    }

    private function estadoIndicadorTiempo($variacionTiempo, int $totalActividades): string
    {
        if ($totalActividades === 0 || $variacionTiempo === null) {
            return 'NO_INICIADO';
        }
        if ($variacionTiempo <= 0) {
            return 'CUMPLIDO';
        }
        return 'NO_CUMPLIDO';
    }

    private function estadoIndicadorCumplimiento($actividades): string
    {
        if ($actividades->isEmpty()) {
            return 'NO_INICIADO';
        }

        if ($actividades->every(fn ($actividad) => $actividad->estado_reportado === 'NO_INICIADA')) {
            return 'NO_INICIADO';
        }

        if ($actividades->contains(fn ($actividad) => $actividad->estado_reportado === 'EN_RIESGO')) {
            return 'NO_CUMPLIDO';
        }

        if ($actividades->every(fn ($actividad) => $actividad->estado_reportado === 'COMPLETADA')) {
            return 'CUMPLIDO';
        }

        return 'EN_PROGRESO';
    }

    private function estadoCumplimientoAnd(array $indicadores): string
    {
        if (count(array_unique($indicadores)) === 1 && $indicadores[0] === 'NO_INICIADO') {
            return 'NO_INICIADO';
        }

        if (!in_array('CUMPLIDO', $indicadores, true) && in_array('NO_CUMPLIDO', $indicadores, true)) {
            return 'NO_CUMPLIDO';
        }

        return $indicadores[0] === 'CUMPLIDO' && $indicadores[1] === 'CUMPLIDO' && $indicadores[2] === 'CUMPLIDO'
            ? 'CUMPLIDO'
            : 'EN_PROGRESO';
    }

    private function estadoCumplimientoOr(array $indicadores): string
    {
        if (count(array_unique($indicadores)) === 1 && $indicadores[0] === 'NO_INICIADO') {
            return 'NO_INICIADO';
        }

        if (in_array('CUMPLIDO', $indicadores, true)) {
            return 'EN_PROGRESO';
        }

        return 'NO_CUMPLIDO';
    }
}
