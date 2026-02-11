<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Actividad;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::any(['view actividades', 'manage actividades']);
        // Lógica para obtener y mostrar la lista de actividades
        $actividades = Actividad::with(['objetivosEstrategicos', 'proyecto'])
            ->where('activo', true)
            ->get();

        return view('actividades.index', compact('actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::any(['create actividades', 'manage actividades']);
        $validated = $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'codigo' => 'nullable|string|max:50',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'responsable' => 'nullable|string|max:255',
            'estado' => 'required|in:PLANIFICADA,EN_PROGRESO,COMPLETADA',
            'prioridad' => 'required|integer|min:1|max:5',
            'fecha_inicio_planificada' => 'required|date',
            'fecha_fin_planificada' => 'required|date|after_or_equal:fecha_inicio_planificada',
            'fecha_inicio_real' => 'nullable|date',
            'fecha_fin_real' => 'nullable|date|after_or_equal:fecha_inicio_real',
            'avance_planificado' => 'nullable|numeric|min:0|max:100',
            'avance_real' => 'nullable|numeric|min:0|max:100',
            'objetivos_estrategicos' => 'required|array|min:1',
            'objetivos_estrategicos.*' => 'exists:objEstrategicos,idobjEstrategico'
        ], $this->validationMessages(), $this->validationAttributes());

        $codigo = $validated['codigo'] ?: $this->generarCodigo($validated['proyecto_id']);
        $data = array_merge($validated, [
            'codigo' => $codigo
        ], $this->calcularCampos($request));

        $actividad = Actividad::create($data);
        $actividad->objetivosEstrategicos()->sync($request->input('objetivos_estrategicos', []));

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::any(['view actividades', 'manage actividades']);
        $actividad = Actividad::with(['objetivosEstrategicos', 'proyecto'])->findOrFail($id);
        return view('actividades.show', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::any(['edit actividades', 'manage actividades']);
        $validated = $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'codigo' => 'required|string|max:50',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'responsable' => 'nullable|string|max:255',
            'estado' => 'required|in:PLANIFICADA,EN_PROGRESO,COMPLETADA',
            'prioridad' => 'required|integer|min:1|max:5',
            'fecha_inicio_planificada' => 'required|date',
            'fecha_fin_planificada' => 'required|date|after_or_equal:fecha_inicio_planificada',
            'fecha_inicio_real' => 'nullable|date',
            'fecha_fin_real' => 'nullable|date|after_or_equal:fecha_inicio_real',
            'avance_planificado' => 'nullable|numeric|min:0|max:100',
            'avance_real' => 'nullable|numeric|min:0|max:100',
            'objetivos_estrategicos' => 'required|array|min:1',
            'objetivos_estrategicos.*' => 'exists:objEstrategicos,idobjEstrategico'
        ], $this->validationMessages(), $this->validationAttributes());

        $actividad = Actividad::findOrFail($id);
        $data = array_merge($validated, $this->calcularCampos($request));
        $actividad->update($data);
        $actividad->objetivosEstrategicos()->sync($request->input('objetivos_estrategicos', []));

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::any(['delete actividades', 'manage actividades']);
        $actividad = Actividad::findOrFail($id);
        $actividad->update(['activo' => false]);

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad eliminada correctamente');
    }

    public function documentopdf()
    {
        Gate::any(['view actividades', 'manage actividades']);
        $actividades = Actividad::with(['objetivosEstrategicos', 'proyecto'])
            ->where('activo', true)
            ->get();
        $pdf = PDF::loadView('actividades.pdf', compact('actividades'));
        return $pdf->stream('actividades.pdf');
    }

    private function generarCodigo(int $proyectoId): string
    {
        $count = Actividad::where('proyecto_id', $proyectoId)->count() + 1;
        return 'ACT' . str_pad((string) $count, 3, '0', STR_PAD_LEFT);
    }

    private function calcularCampos(Request $request): array
    {
        $inicioPlan = $request->fecha_inicio_planificada
            ? Carbon::parse($request->fecha_inicio_planificada)
            : null;
        $finPlan = $request->fecha_fin_planificada
            ? Carbon::parse($request->fecha_fin_planificada)
            : null;
        $finReal = $request->fecha_fin_real
            ? Carbon::parse($request->fecha_fin_real)
            : null;

        $duracionPlanificada = null;
        if ($inicioPlan && $finPlan) {
            $duracionPlanificada = $inicioPlan->diffInDays($finPlan);
        }

        $variacionTiempo = null;
        if ($finPlan && $finReal) {
            $variacionTiempo = $finPlan->diffInDays($finReal, false);
        }

        $avanceReal = $request->avance_real;
        $estadoReportado = 'NO_INICIADA';
        if ($avanceReal !== null && $avanceReal > 0) {
            if ($finPlan && $finReal && $finReal->lte($finPlan)) {
                $estadoReportado = 'COMPLETADA';
            } else {
                $estadoReportado = 'EN_RIESGO';
            }
        }

        return [
            'duracion_planificada_dias' => $duracionPlanificada,
            'variacion_tiempo_dias' => $variacionTiempo,
            'estado_reportado' => $estadoReportado
        ];
    }


    private function validationMessages(): array
    {
        return [
            'proyecto_id.required' => 'Selecciona un proyecto para la actividad.',
            'proyecto_id.exists' => 'El proyecto seleccionado no es valido.',
            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'nombre.max' => 'El nombre no debe superar 255 caracteres.',
            'codigo.max' => 'El codigo no debe superar 50 caracteres.',
            'estado.required' => 'Selecciona un estado para la actividad.',
            'estado.in' => 'El estado seleccionado no es valido.',
            'prioridad.required' => 'Indica la prioridad de la actividad.',
            'prioridad.integer' => 'La prioridad debe ser un numero entero.',
            'prioridad.min' => 'La prioridad minima es 1.',
            'prioridad.max' => 'La prioridad maxima es 5.',
            'fecha_inicio_planificada.required' => 'La fecha de inicio planificada es obligatoria.',
            'fecha_fin_planificada.required' => 'La fecha de fin planificada es obligatoria.',
            'fecha_fin_planificada.after_or_equal' => 'La fecha de fin planificada debe ser posterior o igual a la fecha de inicio.',
            'fecha_inicio_real.date' => 'La fecha de inicio real no tiene un formato valido.',
            'fecha_fin_real.date' => 'La fecha de fin real no tiene un formato valido.',
            'fecha_fin_real.after_or_equal' => 'La fecha de fin real debe ser posterior o igual a la fecha de inicio real.',
            'avance_planificado.numeric' => 'El avance planificado debe ser numerico.',
            'avance_planificado.min' => 'El avance planificado no puede ser menor a 0.',
            'avance_planificado.max' => 'El avance planificado no puede superar 100.',
            'avance_real.numeric' => 'El avance real debe ser numerico.',
            'avance_real.min' => 'El avance real no puede ser menor a 0.',
            'avance_real.max' => 'El avance real no puede superar 100.',
            'objetivos_estrategicos.required' => 'Selecciona al menos un objetivo estrategico.',
            'objetivos_estrategicos.array' => 'Selecciona objetivos estrategicos validos.',
            'objetivos_estrategicos.min' => 'Selecciona al menos un objetivo estrategico.',
            'objetivos_estrategicos.*.exists' => 'Uno o mas objetivos estrategicos no son validos.'
        ];
    }

    private function validationAttributes(): array
    {
        return [
            'proyecto_id' => 'proyecto',
            'fecha_inicio_planificada' => 'fecha de inicio planificada',
            'fecha_fin_planificada' => 'fecha de fin planificada',
            'fecha_inicio_real' => 'fecha de inicio real',
            'fecha_fin_real' => 'fecha de fin real',
            'avance_planificado' => 'avance planificado',
            'avance_real' => 'avance real',
            'objetivos_estrategicos' => 'objetivos estrategicos'
        ];
    }
}
