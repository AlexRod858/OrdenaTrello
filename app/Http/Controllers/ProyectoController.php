<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarea;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{

    ///////////  REALIZADOR  //////////
    public function index()
    {
        $user_id = Auth::id();

        if (Auth::user()->admin) {
            $proyectos = Proyecto::where('user_id', $user_id)->paginate();
        } else {
            $proyectos = Proyecto::whereHas('tareas', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->paginate();
        }

        return view('proyecto.index', compact('proyectos'))
            ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }


    public function create()
    {
        $proyecto = new Proyecto();
        $proyecto->user_id = auth()->id();
        return view('proyecto.create', compact('proyecto'));
    }

    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'El proyecto se ha creado exitósamente.');
    }


    public function show(Proyecto $proyecto)
    {
        $tareas = $proyecto->tareas()->get();
        // dd($tareas);
        return view('proyecto.show', compact('proyecto', 'tareas'));
    }

    // public function edit($id)
    // {
    //     $proyecto = Proyecto::find($id);

    //     return view('proyecto.edit', compact('proyecto'));
    // }

    // public function update(Request $request, Proyecto $proyecto)
    // {
    //     request()->validate(Proyecto::$rules);

    //     $proyecto->update($request->all());

    //     return redirect()->route('proyectos.index')
    //         ->with('success', 'El proyecto se ha editado exitósamente');
    // }

    // public function destroy($id)
    // {
    //     $proyecto = Proyecto::find($id)->delete();

    //     return redirect()->route('proyectos.index')
    //         ->with('success', 'El proyecto se ha borrado exitósamente');
    // }
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
        //////////  para usuarios normales  ////////////
        $tareasPendientesUsuario = Tarea::where('user_id', auth()->id())->where('estado', '!=', 'completado')->count();
        $totalfinalizadasUsuario = auth()->user()->tareas_realiz;
        /////////////////////
        // Devolver la vista con los datos
        if (auth()->user()->admin) {
            return view('home', compact('proyectos', 'tareasPendientes', 'tareasCompletadas24h'));
        } else {
            return view('home2', compact('tareasPendientesUsuario', 'totalfinalizadasUsuario'));
        }
    }
}
