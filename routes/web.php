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

     // ==================================================================================
     // RUTAS INDEX - Acceso de LECTURA (view OR manage permissions)
     // ==================================================================================
     
     // 👑 ADMINISTRADOR DEL SISTEMA - Ver listados de usuarios
     Route::middleware('can.any:view usuarios,manage usuarios')->group(function() {
          Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
          Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');
          Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
          Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
          Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
          Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
     });

     // 🏢 GESTOR DE ENTIDADES - Ver listado de entidades
     Route::middleware('can.any:view entidades,manage entidades')->group(function() {
          Route::get('/entidades', [EntidadController::class, 'index'])->name('entidades.index');
          Route::get('/entidades/{entidad}', [EntidadController::class, 'show'])->name('entidades.show');
     });

     // 🏗️ COORDINADOR DE UNIDADES - Ver listado de unidades
     Route::middleware('can.any:view unidades,manage unidades')->group(function() {
          Route::get('/unidades', [UnidadController::class, 'index'])->name('unidades.index');
          Route::get('/unidades/{unidad}', [UnidadController::class, 'show'])->name('unidades.show');
     });

     // 🎯 ESPECIALISTA EN ODS - Ver listado de ODS
     Route::middleware('can.any:view ods,manage ods')->group(function() {
          Route::get('/ods', [OdsController::class, 'index'])->name('ods.index');
          Route::get('/ods/{ods}', [OdsController::class, 'show'])->name('ods.show');
     });

     // 🎯 PLANIFICADOR ESTRATÉGICO - Ver listado de objetivos estratégicos
     Route::middleware('can.any:view objetivos_estrategicos,manage objetivos_estrategicos')->group(function() {
          Route::get('/objEstrategicos', [ObjEstrategicoController::class, 'index'])->name('objEstrategicos.index');
          Route::get('/objEstrategicos/{objEstrategico}', [ObjEstrategicoController::class, 'show'])->name('objEstrategicos.show');
     });

     // 🇵🇪 ANALISTA DE PND - Ver listado de PND
     Route::middleware('can.any:view pnd,manage pnd')->group(function() {
          Route::get('/pnd', [PndController::class, 'index'])->name('pnd.index');
          Route::get('/pnd/{pnd}', [PndController::class, 'show'])->name('pnd.show');
     });

     // 📋 GESTOR DE PLANES - Ver listado de planes
     Route::middleware('can.any:view planes,manage planes')->group(function() {
          Route::get('/planes', [PlanController::class, 'index'])->name('planes.index');
          Route::get('/planes/{plan}', [PlanController::class, 'show'])->name('planes.show');
     });

     // 📊 COORDINADOR DE PROGRAMAS - Ver listado de programas
     Route::middleware('can.any:view programas,manage programas')->group(function() {
          Route::get('/programas', [ProgramaController::class, 'index'])->name('programas.index');
          Route::get('/programas/{programa}', [ProgramaController::class, 'show'])->name('programas.show');
     });

     // 📈 ANALISTA DE PROYECTOS - Ver listado de proyectos
     Route::middleware('can.any:view proyectos,manage proyectos')->group(function() {
          Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
          Route::get('/proyectos/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');
     });

     // RUTAS CRUD - Gestión COMPLETA (manage permissions only)
     
     // 👑 ADMINISTRADOR DEL SISTEMA - Gestión completa de usuarios
     Route::middleware('can:manage usuarios')->group(function() {
          Route::resource('usuarios', UserController::class)->except(['index', 'show']);
          Route::resource('roles', RoleController::class)->except(['index', 'show']);
          Route::resource('permissions', PermissionController::class)->except(['index', 'show']);
     });

     // 🏢 GESTOR DE ENTIDADES - CRUD completo de entidades
     Route::middleware('can:manage entidades')->group(function() {
          Route::resource('entidades', EntidadController::class)->except(['index', 'show']);
     });

     // 🏗️ COORDINADOR DE UNIDADES - CRUD completo de unidades
     Route::middleware('can:manage unidades')->group(function() {
          Route::resource('unidades', UnidadController::class)->except(['index', 'show']);
     });

     // 🎯 ESPECIALISTA EN ODS - CRUD completo de ODS
     Route::middleware('can:manage ods')->group(function() {
          Route::resource('ods', OdsController::class)->except(['index', 'show']);
     });

     // 🎯 PLANIFICADOR ESTRATÉGICO - CRUD completo de objetivos estratégicos
     Route::middleware('can:manage objetivos_estrategicos')->group(function() {
          Route::resource('objEstrategicos', ObjEstrategicoController::class)->except(['index', 'show']);
     });

     // 🇵🇪 ANALISTA DE PND - CRUD completo de PND
     Route::middleware('can:manage pnd')->group(function() {
          Route::resource('pnd', PndController::class)->except(['index', 'show']);
     });

     // 📋 GESTOR DE PLANES - CRUD completo de planes
     Route::middleware('can:manage planes')->group(function() {
          Route::resource('planes', PlanController::class)->except(['index', 'show']);
     });

     // 📊 COORDINADOR DE PROGRAMAS - CRUD completo de programas
     Route::middleware('can:manage programas')->group(function() {
          Route::resource('programas', ProgramaController::class)->except(['index', 'show']);
     });

     // 📈 ANALISTA DE PROYECTOS - CRUD completo de proyectos
     Route::middleware('can:manage proyectos')->group(function() {
          Route::resource('proyectos', ProyectoController::class)->except(['index', 'show']);
     });

     // RUTAS DE REPORTES (Supervisor General y roles con permisos)
     Route::middleware('can:generate reports')->group(function() {
          Route::get('/entidades/pdf', [EntidadController::class, 'generarPdf'])->name('entidades.pdf');
          Route::get('/programas/pdf', [ProgramaController::class, 'generarPdf'])->name('programas.pdf');
          Route::get('/proyectos/pdf', [ProyectoController::class, 'generarPdf'])->name('proyectos.pdf');
          Route::get('/unidades/pdf', [UnidadController::class, 'generarPdf'])->name('unidades.pdf');
          Route::get('/objEstrategicos/pdf', [ObjEstrategicoController::class, 'generarPdf'])->name('objEstrategicos.pdf');
          Route::get('/pnd/pdf', [PndController::class, 'generarPdf'])->name('pnd.pdf');
          Route::get('/planes/pdf', [PlanController::class, 'generarPdf'])->name('planes.pdf');
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
