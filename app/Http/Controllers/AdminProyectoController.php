<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class AdminProyectoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar todas las tareas para el administrador
  
    // Obtén los proyectos del administrador
    $proyectos = Proyecto::where('user_id', auth()->id())->paginate();

    return view('admin.proyecto.index', compact('proyectos'));


    }

    public function create()
    {
        // Lógica para crear una nueva tarea para el administrador
    }

    public function store(Request $request)
    {
        // Lógica para almacenar una nueva tarea para el administrador
    }

    // Otros métodos y acciones para la administración de tareas por parte del administrador
}
