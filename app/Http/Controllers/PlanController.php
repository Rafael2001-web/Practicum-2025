<?php

namespace App\Http\Controllers;

use App\Models\plan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plan::all();
        return view('planes.index', compact('planes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('planes.index');
    }


    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('planes.show', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nombre'=> 'required|string',
            'entidad'=> 'required|string',
            'presupuesto' => 'required|numeric|min:0',
            'fecha_inicio'=> 'required|date',
            'fecha_fin'=> 'nullable|date',
            'estado'=> 'required|string',
        ]);

        Plan::create($request->all());

        return redirect()->route('planes.index')->with('success', 'Plan Creado Satisfactoriamente');


    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return redirect()->route('planes.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            
            'nombre'=> 'required|string',
            'entidad'=> 'required|string',
            'presupuesto' => 'required|numeric|min:0',
            'fecha_inicio'=> 'required|date',
            'fecha_fin'=> 'nullable|date',
            'estado'=> 'required|string',
        ]);

        $plan = Plan::findOrfail($id);
        $plan->update($request->all()); // error

        return redirect()->route('planes.index')->with('success', 'Plan Actualizado Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plan = Plan::findOrfail($id);
        $plan->delete();

         return redirect()->route('planes.index')->with('success', 'Plan Eliminado Satisfactoriamente');

    }

    public function GenerarPDF(){
        $plan = Plan::all();
        $pdf =Pdf::loadView('Planes.pdf', compact('plan'));
        return $pdf->stream('reporte_planes.pdf');
    }
}
