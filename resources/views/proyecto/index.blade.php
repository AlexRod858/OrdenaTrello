@extends('layouts.app')

@section('template_title')
    Proyecto
@endsection

@section('content')
<div class="container-fluid border-top border-bottom mb-5 mt-2">
    <div class="row">
        <div class="col-sm-6">
            <h1 style="color: coral;">PROYECTOS EN LOS QUE PARTICIPO</h1>
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
                        @if (count($proyectos) > 0)
                            <table class="table table-dark table-hover">
                                <thead class="thead">
                                    <tr>
                                            <th>No.</th>

                                            <th>Titulo del Proyecto</th>
                                            <th>Id del proyecto</th>
                                            <th>Fecha Creación</th>
                                            <th>Nº Tareas</th>
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
                                                        <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-icon btn-light">
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
