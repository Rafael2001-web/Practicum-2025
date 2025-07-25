<?php

namespace App\Http\Controllers;

use App\Models\pnd;
use Illuminate\Http\Request;

class PndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pnd = Pnd::all();
        return view('pnd.index', compact('pnd'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $pnd = Pnd::all();
        return view('pnd.create', compact('pnd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'eje'=> 'required|string',
            'objetivoN'=> 'required|integer',
            'descripcion'=> 'required|string',
        ]);

        Pnd::create($request->all());

        return redirect()->route('pnd.index')->with('success', 'PND Creado Satisfactoriamente');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pnd = Pnd::findOrfail($id);
        return view('pnd.edit', compact('pnd')); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'eje'=> 'required|string',
            'objetivoN'=> 'required|integer',
            'descripcion'=> 'required|string',
        ]);

        $pnd = Pnd::findOrfail($id);
        $pnd->update($request->all()); // error

        return redirect()->route('pnd.index')->with('success', 'PND Actualizado Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pnd = Pnd::findOrfail($id);
        $pnd->delete();

         return redirect()->route('pnd.index')->with('success', 'ODS Eliminado Satisfactoriamente');

    }
}
