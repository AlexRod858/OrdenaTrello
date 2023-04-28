<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::paginate();

        return view('tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $tarea = new Tarea();
    //     return view('tarea.create', compact('tarea'));
    // }

    public function create($proyecto_id)
    {
        $tarea = new Tarea();
        $tarea->proyecto_id = $proyecto_id;
        return view('tarea.create', compact('tarea', 'proyecto_id'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    request()->validate(Tarea::$rules);

    $tarea = Tarea::create($request->all());
    
    return redirect()->route('proyectos.show', ['proyecto' => $tarea->proyecto_id])
            ->with('success', 'Tarea created successfully.');
}

 
    // public function store(Request $request)
    // {
    //     request()->validate(Tarea::$rules);
    
    //     $tarea = new Tarea([
    //         'descripcion' => $request->input('descripcion'),
    //         'estado' => $request->input('estado'),
    //         'user_id' => auth()->id(),
    //         'proyecto_id' => $request->input('proyecto_id'),
    //         'fecha_limite' => $request->input('fecha_limite'),
    //     ]);
    
    //     $tarea->save();
    
    //     return redirect()->route('tareas.index')
    //         ->with('success', 'Tarea created successfully.');
    // }
    




    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tarea $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id)->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea deleted successfully');
    }
}
