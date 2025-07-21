<?php

namespace App\Http\Controllers;

use App\Models\objEstrategico;
use Illuminate\Http\Request;

class ObjEstrategicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objEstrategicos = objEstrategico::all();
        return view('objEstrategicos.index', compact('objEstrategicos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objEstrategicos = objEstrategico::all();
        return view('objEstrategicos.create', compact('objEstrategicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idobjEstrategicos'=> 'integer|unique:idobjEstrategico',
            'fechaRegistro'=> 'required|date',
            'descripcion'=> 'required|string',
            'estado'=> 'required|string',
        ]);

        objEstrategico::create($request->all());

        return redirect()->route('objEstrategicos.index')->with('success', 'Objetivo Estrategico Registrado Satisfactoriamente');


    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $objEstrategicos = objEstrategico::findOrfail($id);
        return view('objEstrategicos.edit', compact('objEstrategico')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'id'=> 'required|integer|unique:idobjEstrategico,codigo',
            'fechaRegistro'=> 'required|date',
            'descripcion'=> 'required|string',
            'estado'=> 'required|string',
        ]);

        $objEstrategicos = objEstrategico::findOrfail($id);
        $objEstrategicos->update($request->all()); // error

        return redirect()->route('objEstrategicos.index')->with('success', 'Objetivo Estratégico Actualizado Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $objEstrategicos = objEstrategico::findOrfail($id);
        $objEstrategicos->delete();

         return redirect()->route('$objEstrategicos.index')->with('success', 'Objetivo Estratégico Eliminada Satisfactoriamente');

    }
}