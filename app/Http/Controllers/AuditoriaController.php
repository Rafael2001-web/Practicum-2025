<?php

namespace App\Http\Controllers;

use App\Models\ActividadAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuditoriaController extends Controller
{
    public function index()
    {
        Gate::any(['view auditorias']);

        $auditorias = ActividadAuditoria::with(['user', 'actividad.proyecto'])
            ->orderByDesc('created_at')
            ->get();

        return view('auditorias.index', compact('auditorias'));
    }
}
