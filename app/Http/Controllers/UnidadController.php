<?php

namespace App\Http\Controllers;

use App\Models\unidad;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidad::all();
        return view('unidades.index', compact('unidades'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidad::all();
        return view('unidades.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'macrosector'=> 'required|string',
            'sector'=> 'required|string',
            'estado'=> 'required|string',
        ]);

        Unidad::create($request->all());

        return redirect()->route('unidades.index')->with('success', 'Unidad Creada Satisfactoriamente');
    }

    public function show(Request $request)
    {
        $unidades = Unidad::all();
        return view('unidades.show', compact('unidades'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unidades = Unidad::findOrfail($id);
        return view('unidades.edit', compact('unidades')); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'macrosector'=> 'required|string',
            'sector'=> 'required|string',
            'estado'=> 'required|string',
        ]);

        $unidades = Unidad::findOrfail($id);
        $unidades->update($request->all());

        return redirect()->route('unidades.index')->with('success', 'Unidad Actualizada Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unidades = Unidad::findOrfail($id);
        $unidades->delete();

         return redirect()->route('unidades.index')->with('success', 'Unidad Eliminada Satisfactoriamente');

    }

    public function GenerarPDF(){
        $unidad = Unidad::all();
        $pdf =Pdf::loadView('unidades.pdf', compact('unidad'));
        return $pdf->stream('reporte_unidad.pdf');
    }
}
