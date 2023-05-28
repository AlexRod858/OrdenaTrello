@extends('layouts.app')

@section('template_title')
    Tarea
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-white bg-dark">
                <div class="card-header">

                    <div class="container-fluid border-top border-bottom mb-5 mt-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 style="color: coral;">MIS TAREAS CREADAS</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-dark pt-5">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover border border-light">
                            <thead class="thead">
                                <tr>
                                    <th class="coral-color">No.</th>
                                    <th class="coral-color">Nombre de Proyecto</th>
                                    <th class="coral-color">Descripción de la Tarea</th>
                                    <th class="coral-color">Estado</th>
                                    <th class="coral-color">Fecha Límite</th>
                                    <th class="coral-color">Asignado a:</th>
                                    {{-- <th>Creador</th> --}}
                                    <th></th>
                                </tr>
                                <style>
                                    .coral-color {
                                        color: coral;
                                    }
                                </style>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $tarea)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $tarea->proyecto->titulo }}</td>
                                        <td>{{ strlen($tarea->descripcion) > 40 ? substr($tarea->descripcion, 0, 40) . '...' : $tarea->descripcion }}</td>
                                        <td>{{ $tarea->estado }}</td>
                                        <td>{{ $tarea->fecha_limite }}</td>
                                        <td>{{ $tarea->user->name }}</td>
                                        {{-- <td>{{ $tarea->proyecto->user->name }}</td> --}}
                                        <td>
                                            <form action="{{ route('admin.tareas.destroy', $tarea->id) }}" method="POST">
                                                <a href="{{ route('admin.tareas.show', $tarea->id) }}"
                                                    class="btn btn-icon btn-light">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('admin.tareas.edit', $tarea->id) }}"
                                                    class="btn btn-icon btn-light">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.tareas.destroy', $tarea->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-light">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
