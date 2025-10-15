<?php

namespace App\Http\Controllers;

use App\Models\Ods;
use Illuminate\Http\Request;

class OdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ods = Ods::all();
        return view('ods.index', compact('ods'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('ods.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'odsnum'=> 'required|integer',
            'nombre'=> 'required|string',
            'descripcion'=> 'required|string',
        ]);

        Ods::create($request->all());

        return redirect()->route('ods.index')->with('success', 'ODS Creado Satisfactoriamente');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return redirect()->route('ods.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'odsnum'=> 'required|integer',
            'nombre'=> 'required|string',
            'descripcion'=> 'required|string',
        ]);

        $ods = Ods::findOrfail($id);
        $ods->update($request->all()); // error

        return redirect()->route('ods.index')->with('success', 'ODS Actualizado Satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ods = Ods::findOrfail($id);
        $ods->delete();

         return redirect()->route('ods.index')->with('success', 'ODS Eliminado Satisfactoriamente');

    }
}
