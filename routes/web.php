<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
////////////////////////////////////////////////////////////////
// Auth::routes();ç

// Rutas para el administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('proyectos', App\Http\Controllers\AdminProyectoController::class)
        ->names('admin.proyectos'); // Establece un nombre de ruta personalizado para el administrador
    Route::resource('tareas', App\Http\Controllers\AdminTareaController::class)
        ->names('admin.tareas'); // Establece un nombre de ruta personalizado para el administrador
    // 
    Route::get('/tarea/create/{proyecto_id}', [App\Http\Controllers\AdminTareaController::class, 'create'])
    ->name('admin.tarea.create');

});



// Rutas para usuarios normales
Route::middleware('auth')->group(function () {
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    Route::resource('tareas', App\Http\Controllers\TareaController::class);
});

require __DIR__.'/auth.php';
