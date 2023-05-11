<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;
// 
use App\Models\User;
// 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TareaController extends Controller
{
//////  ADMIN  /////
    // public function index()
    // {
    //     $tareas = Tarea::paginate();

    //     return view('tarea.index', compact('tareas'))
    //         ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    // }
///// USUARIO //////
    public function index()
    {
        $realizador = auth()->id();
        $tareas = Tarea::where('user_id', $realizador)->paginate();

        return view('tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }



    public function create($proyecto_id)
    {
        $tarea = new Tarea();
        $tarea->proyecto_id = $proyecto_id;
    
        $users = User::all(); // Obtener todos los usuarios
    
        return view('tarea.create', compact('tarea', 'proyecto_id', 'users'));
    }
    


    // public function store(Request $request)
    // {
    //     request()->validate(Tarea::$rules);
    //     dd($request->all());
    //     $tarea = Tarea::create($request->all());

    //     return redirect()->route('proyectos.show', ['proyecto' => $tarea->proyecto_id])
    //         ->with('success', 'Tarea created successfully.');
    // }
    public function store(Request $request)
{
    request()->validate(Tarea::$rules);

    $tarea = new Tarea();
    $tarea->descripcion = $request->descripcion;
    $tarea->estado = $request->estado;
    $tarea->user_id = $request->realizador; // Asignar el valor de "realizador" a "user_id"
    $tarea->proyecto_id = $request->proyecto_id;
    $tarea->fecha_limite = $request->fecha_limite;
    // Resto de los campos de la tarea

    $tarea->save();

    return redirect()->route('proyectos.show', ['proyecto' => $tarea->proyecto_id])
        ->with('success', 'Tarea created successfully.');
}

 


    public function show($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.show', compact('tarea'));
    }


    public function edit($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.edit', compact('tarea'));
    }


    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea updated successfully');
    }


    public function destroy($id)
    {
        $tarea = Tarea::find($id)->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea deleted successfully');
    }

}
