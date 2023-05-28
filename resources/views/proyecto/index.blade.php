@extends('layouts.app')

@section('template_title')
    Proyecto
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row t-5">
        <div class="col-sm-12">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    <div class="container-fluid border-top border-bottom mb-5">
                        <div id="proyectosParticipo"></div>

                    </div>

                    <div class="card-body bg-dark pt-5">
                        <div class="table-responsive">
                            @if (count($proyectos) > 0)
                                <table class="table table-dark table-hover border border-light">
                                    <thead class="thead">
                                        <tr>
                                            <th style="color: coral">No.</th>

                                            <th style="color: coral">Titulo del Proyecto</th>
                                            <th style="color: coral">Id del proyecto</th>
                                            <th style="color: coral">Fecha Creación</th>
                                            <th style="color: coral">Nº Tareas</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $proyecto->titulo }}</td>
                                                <td>{{ $proyecto->id }}</td>
                                                <td>{{ $proyecto->created_at }}</td>
                                                <td>{{ $proyecto->tareas->count() }}</td>
                                                <td>
                                                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('proyectos.show', $proyecto->id) }}"
                                                            class="btn btn-icon btn-light">
                                                            <i class="fas fa-eye"></i>
                                                        </a>


                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No hay proyectos aún.</p>
                            @endif
                        </div>
                    </div>
                </div>
                {!! $proyectos->links() !!}
            </div>
        </div>
    </div>
@endsection
