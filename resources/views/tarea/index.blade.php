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

    <div class="row ">
        <div class="col-sm-12">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <div class="container-fluid border-top border-bottom mb-5">
                        <div id="tareasAsignadas"></div>

                    </div>
                </div>


                <div class="card-body bg-dark  pt-5">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover border border-light">
                            <thead class="thead">
                                <tr>
                                    <th style="color: coral">No.</th>
                                    <th style="color: coral">Título</th>
                                    <th style="color: coral">Descripción</th>
                                    <th style="color: coral">Estado</th>
                                    <th style="color: coral">Fecha Límite</th>
                                    <th style="color: coral">Creador</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $tarea)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $tarea->proyecto->titulo }}</td>
                                        <td>{{ strlen($tarea->descripcion) > 40 ? substr($tarea->descripcion, 0, 40) . '...' : $tarea->descripcion }}
                                        </td>
                                        <td>{{ $tarea->estado }}</td>
                                        <td>{{ $tarea->fecha_limite }}</td>
                                        <td>{{ $tarea->proyecto->user->name }}</td>

                                        <td>
                                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                                                <a href="{{ route('tareas.show', $tarea->id) }}"
                                                    class="btn btn-icon btn-light">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('tareas.edit', $tarea->id) }}"
                                                    class="btn btn-icon btn-light">
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
