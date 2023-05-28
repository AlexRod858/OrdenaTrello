<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        $proyecto = new Proyecto();
        $proyecto->user_id = auth()->id();
        return view('admin.proyecto.create', compact('proyecto'));
    }



    public function show(Proyecto $proyecto)
    {
        $tareas = $proyecto->tareas()->get();
        // dd($tareas);
        return view('admin.proyecto.show', compact('proyecto', 'tareas'));
    }


    public function edit($id)
    {
        $proyecto = Proyecto::find($id);

        return view('admin.proyecto.edit', compact('proyecto'));
    }


    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'El proyecto se ha editado exitósamente');
    }


    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'El proyecto se ha creado exitósamente.');
    }


    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'El proyecto se ha borrado exitósamente');
    }


    // Otros métodos y acciones para la administración de tareas por parte del administrador
    public function tareasCompletadas()
    {
        return $this->tareas()->where('estado', 'completado')->count();
    }

    public function contador()
    {
        // Obtén los proyectos del administrador
        $proyectos = Proyecto::where('user_id', auth()->id())->paginate();
    
        // Contador de tareas pendientes
        $tareasPendientes = 0;
    
        // Contador de tareas completadas en las últimas 24 horas
        $tareasCompletadas24h = 0;
    
        // Recorrer cada proyecto
        foreach ($proyectos as $proyecto) {
            // Contar las tareas pendientes
            $tareasPendientes += $proyecto->tareas()->where('estado', '!=', 'completado')->count();
            
            // Contar las tareas completadas en las últimas 24 horas
            $tareasCompletadas24h += $proyecto->tareas()
                ->where('estado', 'completado')
                ->whereBetween('updated_at', [Carbon::now()->subDay(), Carbon::now()])
                ->count();
        }
        
        // Devolver la vista con los datos
        return view('home', compact('proyectos', 'tareasPendientes', 'tareasCompletadas24h'));
    }
    
    
}
