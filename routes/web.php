<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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


//envia un usuario al dashboard
/*Route::get('/', function () {
    return view('dashboard');
});

// Usuario sea o no autenticado lo dirige al dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/


// Redirige la raíz al login o, si ya estás autenticado, al dashboard

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//Admin autenticado para diferentes funcionalidades
Route::middleware('role:admin')->group(function () {
    Route::resource('entidades', EntidadController::class);
    Route::resource('programas', ProgramaController::class);
    });


//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__.'/auth.php';
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
;