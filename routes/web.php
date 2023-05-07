<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaController;

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

Route::middleware(['auth'])->group(function () {
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    Route::resource('tareas', App\Http\Controllers\TareaController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tarea/create/{proyecto_id}', [TareaController::class, 'create'])->name('tarea.create');
// 
Route::post('/tareas/buscar', [App\Http\Controllers\TareaController::class, 'buscar'])->name('tareas.buscar');
//  