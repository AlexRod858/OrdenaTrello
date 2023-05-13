<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class AdminTareaController extends Controller
{
    //////  ADMIN  /////
    public function index()
    {
        $tareas = Tarea::paginate();

        return view('tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
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
