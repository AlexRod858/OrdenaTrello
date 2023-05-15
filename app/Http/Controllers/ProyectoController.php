<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     ///////////  ADMIN  //////////

//     public function index()
// {
//     $user_id = Auth::id(); // obtiene el ID del usuario autenticado
    
//     $proyectos = Proyecto::where('user_id', $user_id)->paginate();

//     return view('proyecto.index', compact('proyectos'))
//         ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
// }

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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
}
