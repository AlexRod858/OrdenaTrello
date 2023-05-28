<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaController;
use App\Http\Controllers\AdminProyectoController;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas para el administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('proyectos', App\Http\Controllers\AdminProyectoController::class)
        ->names('admin.proyectos'); // Establece un nombre de ruta personalizado para el administrador
    Route::resource('tareas', App\Http\Controllers\AdminTareaController::class)
        ->names('admin.tareas'); // Establece un nombre de ruta personalizado para el administrador
    
    Route::get('/tarea/create/{proyecto_id}', [App\Http\Controllers\AdminTareaController::class, 'create'])
        ->name('admin.tarea.create');
    
    });

// Rutas para usuarios normales
Route::middleware('auth')->group(function () {
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    Route::resource('tareas', App\Http\Controllers\TareaController::class);
    
    Route::get('/home', [App\Http\Controllers\ProyectoController::class, 'contador'])->name('home2');
});

Route::fallback(function () {
    return redirect('/');
});

