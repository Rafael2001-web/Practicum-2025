<?php

namespace App\Http\Controllers;

use App\Models\proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'sector' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'required|numeric|min:0',
        ]);

        Proyecto::create([
            'codigo' => 'PRO-' . strtoupper(uniqid()),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'sector' => $request->sector,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'presupuesto' => $request->presupuesto,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado correctamente');
    }
    /**
     * Display the specified resource.
     */
   public function show(Proyecto $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'sector' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'required|numeric|min:0',
            'estado' => 'required|in:borrador,aprobado,ejecucion,completado'
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado correctamente');
    }
}
