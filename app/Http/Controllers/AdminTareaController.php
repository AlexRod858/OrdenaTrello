<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\User;

use Illuminate\Http\Request;

class AdminTareaController extends Controller
{
    //////  ADMIN  /////
    public function index()
    {
        $userId = auth()->id();
        $tareas = Tarea::whereHas('proyecto', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate();
    
        return view('admin.tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }
    

    public function create($proyecto_id)
    {
        $tarea = new Tarea();
        $tarea->proyecto_id = $proyecto_id;
    
        $users = User::all(); // Obtener todos los usuarios
    
        return view('admin.tarea.create', compact('tarea', 'proyecto_id', 'users'));
    }

    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $users = User::all(); // Obtén la lista de usuarios
    
        return view('admin.tarea.edit', compact('tarea', 'users'));
    }
    
    public function store(Request $request)
{
    request()->validate(Tarea::$rules);

    $tarea = new Tarea();
    $tarea->descripcion = $request->descripcion;
    $tarea->user_id = $request->realizador; // Asignar el valor de "realizador" a "user_id"
    $tarea->proyecto_id = $request->proyecto_id;
    $tarea->fecha_limite = $request->fecha_limite;
    $tarea->estado = $request->estado;
    // Resto de los campos de la tarea

    $tarea->save();

    return redirect()->route('admin.proyectos.show', ['proyecto' => $tarea->proyecto_id])
        ->with('success', '¡Nueva Tarea Creada!.');
}

    // Otros métodos y acciones para la administración de tareas por parte del administrador
    public function show($id)
    {
        $tarea = Tarea::find($id);

        return view('admin.tarea.show', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);

        $tarea->update($request->all());

        return redirect()->route('admin.tareas.index')
            ->with('success', 'Tarea updated successfully');
    }
}
