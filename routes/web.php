<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ObjEstrategicoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\OdsController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PndController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\DashboardController;
/*

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Ruta pública
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//Route::resource('entidades', EntidadController::class);
//Route::resource('unidades', UnidadController::class);
//Route::resource('objEstrategicos', ObjEstrategicoController::class);
Route::resource('ods', OdsController::class);
//Route::resource('pnd', PndController::class);
//Route::resource('planes', PlanController::class);
Route::resource('proyectos', ProyectoController::class);
//Route::resource('programas', ProgramaController::class);



//Rutas para exportacion de pdf.
Route::get('/entidades/pdf', [EntidadController::class, 'generarPdf'])->name('entidades.pdf');
Route::resource('entidades', EntidadController::class);

Route::get('/unidades/pdf', [UnidadController::class, 'generarPdf'])->name('unidades.pdf');
Route::resource('unidades', UnidadController::class);

Route::get('/pnd/pdf', [PndController::class, 'generarPdf'])->name('pnd.pdf');
Route::resource('pnd', PndController::class);

Route::get('/planes/pdf', [PlanController::class, 'generarPdf'])->name('planes.pdf');
Route::resource('planes', PlanController::class);

Route::get('/programas/pdf', [ProgramaController::class, 'generarPdf'])->name('programas.pdf');
Route::resource('programas', ProgramaController::class);


Route::get('/objEstrategicos/pdf', [ObjEstrategicoController::class, 'generarPdf'])->name('objEstrategicos.pdf');
Route::resource('objEstrategicos', ObjEstrategicoController::class);


//Rutas para los perfiles
 Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
     ->middleware('guest')
     ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
     ->middleware('guest');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
     ->middleware('auth')
     ->name('logout');

// Registro (si lo usas)
Route::get('/register', [RegisteredUserController::class, 'create'])
     ->middleware('guest')
     ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])
     ->middleware('guest');

// (Opcional) Reset de contraseña…
require __DIR__.'/auth.php';
