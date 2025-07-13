<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function index()
    {
        $entidades = Entidad::all();
        return view('entidades.index', compact('entidades'));
    }

    public function create()
    {
        return view('entidades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:entidades',
            'subsector' => 'required|string',
            'nivel_gobierno' => 'required|string',
            'estado' => 'required',
        ]);
        Entidad::create($data);
        return redirect()->route('entidades.index');
    }

    public function show(Entidad $entidad)
    {
        return view('entidades.show', compact('entidad'));
    }

    public function edit(Entidad $entidad)
    {
        return view('entidades.edit', compact('entidad'));
    }

    public function update(Request $request, Entidad $entidad)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:entidades,codigo,' . $entidad->id,
            'subsector' => 'required|string',
            'nivel_gobierno' => 'required|string',
            'estado' => 'required',
        ]);
        $entidad->update($data);
        return redirect()->route('entidades.index');
    }

    public function destroy(Entidad $entidad)
    {
        $entidad->delete();
        return back();
    }
}