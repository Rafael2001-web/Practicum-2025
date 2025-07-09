<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Entidad;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index', compact('programas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entidades = Entidad::all();
        return view('programas.create', compact('entidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idEntidad'=> 'required|exists:entidades,idEntidad',
            'nombre'=> 'required|string',
            'descripcion'=> 'nullable|string',
        ]);

        Programa::create($request->all());

        return redirect()->route('programas.index')->with('success', 'Programa Creado Satisfactoriamente');


    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programa = Programa::findOrfail($id);
        $entidades = Entidad::all();
        return view('programas.edit', compact('programa','entidades')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'idEntidad'=> 'required|exists:entidades,idEntidad',
            'nombre'=> 'required|string',
            'descripcion'=> 'nullable|string',
        ]);

        $programa = Programa::findOrfail($id);
        $programa->update($request->all()); 

        return redirect()->route('programas.index')->with('success', 'Programa Actualizada Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programa = Programa::findOrfail($id);
        $programa->delete();

         return redirect()->route('programas.index')->with('success', 'Programa Eliminada Satisfactoriamente');

    }
}