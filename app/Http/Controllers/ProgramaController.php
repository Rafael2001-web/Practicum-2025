<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:programas',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required',
        ]);
        Programa::create($data);
        return redirect()->route('programas.index');
    }

    public function show(Programa $programa)
    {
        return view('programas.show', compact('programa'));
    }

    public function edit(Programa $programa)
    {
        return view('programas.edit', compact('programa'));
    }

    public function update(Request $request, Programa $programa)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:programas,codigo,' . $programa->id,
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required',
        ]);
        $programa->update($data);
        return redirect()->route('programas.index');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();
        return back();
    }
}
