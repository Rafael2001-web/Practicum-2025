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
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

//Rutas para los perfiles
Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     // 👑 ADMINISTRADOR DEL SISTEMA - Gestión de Usuarios
     Route::middleware('can:manage usuarios')->group(function() {
          Route::resource('usuarios', UserController::class);
          Route::resource('roles', RoleController::class);
          Route::resource('permissions', PermissionController::class);
     });

     // 🏢 GESTOR DE ENTIDADES - CRUD Completo de Entidades
     Route::middleware('can:manage entidades')->group(function() {
          Route::resource('entidades', EntidadController::class);
          Route::get('/entidades/pdf', [EntidadController::class, 'generarPdf'])->name('entidades.pdf');
     });

     // 🏗️ COORDINADOR DE UNIDADES - CRUD Completo de Unidades
     Route::middleware('can:manage unidades')->group(function() {
          Route::resource('unidades', UnidadController::class);
          Route::get('/unidades/pdf', [UnidadController::class, 'generarPdf'])->name('unidades.pdf');
     });

     // 🎯 ESPECIALISTA EN ODS - CRUD Completo de ODS
     Route::middleware('can:manage ods')->group(function() {
          Route::resource('ods', OdsController::class);
     });

     // 🎯 PLANIFICADOR ESTRATÉGICO - CRUD Completo de Objetivos Estratégicos
     Route::middleware('can:manage objetivos_estrategicos')->group(function() {
          Route::resource('objEstrategicos', ObjEstrategicoController::class);
          Route::get('/objEstrategicos/pdf', [ObjEstrategicoController::class, 'generarPdf'])->name('objEstrategicos.pdf');
     });

     // 🇵🇪 ANALISTA DE PND - CRUD Completo de PND
     Route::middleware('can:manage pnd')->group(function() {
          Route::resource('pnd', PndController::class);
          Route::get('/pnd/pdf', [PndController::class, 'generarPdf'])->name('pnd.pdf');
     });

     // 📋 GESTOR DE PLANES - CRUD Completo de Planes
     Route::middleware('can:manage planes')->group(function() {
          Route::resource('planes', PlanController::class);
          Route::get('/planes/pdf', [PlanController::class, 'generarPdf'])->name('planes.pdf');
     });

     // 📊 COORDINADOR DE PROGRAMAS - CRUD Completo de Programas
     Route::middleware('can:manage programas')->group(function() {
          Route::resource('programas', ProgramaController::class);
          Route::get('/programas/pdf', [ProgramaController::class, 'generarPdf'])->name('programas.pdf');
     });

     // 📈 ANALISTA DE PROYECTOS - CRUD Completo de Proyectos
     Route::middleware('can:manage proyectos')->group(function() {
          Route::resource('proyectos', ProyectoController::class);
     });

     // ==================================================================================
     // RUTAS DE REPORTES (Supervisor General y roles con permisos)
     // ==================================================================================
     Route::middleware('can:generate reports')->group(function() {
          // Aquí se pueden agregar rutas específicas de reportes cuando se implementen
          // Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
          // Route::post('/reportes/generar', [ReporteController::class, 'generar'])->name('reportes.generar');
     });
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
require __DIR__ . '/auth.php';
