@extends('layouts.app')

@section('template_title')
    Tarea
@endsection

@section('content')
<div class="container-fluid border-top border-bottom mb-5 mt-2">
    <div class="row">
        <div class="col-sm-6">
            <h1 style="color: coral;">MIS TAREAS ASIGNADAS</h1>
        </div>
        <div class="col-sm-6 d-flex justify-content-end align-self-center">
            <a href="{{ route('admin.proyectos.create') }}" class="btn btn-sm" data-placement="left"style="background-color: coral; color: white">
                {{ __('Nuevo Proyecto') }}
            </a>
        </div>
    </div>
</div>


    <div class="row mt-5 pt-5">
        <div class="col-sm-12">
            <div class="card">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                    <div class="card-body bg-dark">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No.</th>

                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Fecha Límite</th>
                                        <th>Creador</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tareas as $tarea)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $tarea->proyecto->titulo }}</td>
                                            <td>{{ $tarea->descripcion }}</td>
                                            <td>{{ $tarea->estado }}</td>
                                            <td>{{ $tarea->fecha_limite }}</td>
                                            <td>{{ $tarea->proyecto->user->name }}</td>

                                            <td>
                                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-icon btn-light">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                
                                                    <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-icon btn-light">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tareas->links() !!}
            </div>
        </div>
    </div>
@endsection
