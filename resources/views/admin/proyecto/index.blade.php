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
    <div class="row pt-2">
        <div class="col-sm-12">
            <div class="card text-white bg-dark ">
                <div class="card-header">
                    <div class="container-fluid border-top border-bottom mb-5">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 style="color: coral;">MIS PROYECTOS</h1>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-self-center">
                                <a href="{{ route('admin.proyectos.create') }}" class="btn btn-sm"
                                    data-placement="left"style="background-color: coral; color: white">
                                    {{ __('Nuevo Proyecto') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-dark pt-5">
                        <div class="table-responsive">
                            @if (count($proyectos) > 0)
                                <table class="table table-dark table-hover border border-light">
                                    <thead class="thead">
                                        <tr>
                                            <th class="coral-color">No.</th>
                                            <th class="coral-color">Nombre de Proyecto</th>
                                            <th class="coral-color">Id del proyecto</th>
                                            <th class="coral-color">Fecha Creación</th>
                                            <th class="coral-color">Nº Tareas</th>
                                            <th class="coral-color">Realizadas</th>
                                            <th></th>
                                        </tr>
                                        <style>
                                            .coral-color {
                                                color: coral;
                                            }
                                        </style>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $proyecto->titulo }}</td>
                                                <td>{{ $proyecto->id }}</td>
                                                <td>{{ $proyecto->created_at }}</td>
                                                <td>{{ $proyecto->tareas->count() }}</td>
                                                <td>{{ $proyecto->tareasCompletadas() }} / {{ $proyecto->tareas->count() }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.proyectos.destroy', $proyecto->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('admin.proyectos.show', $proyecto->id) }}"
                                                            class="btn btn-icon btn-light">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <a href="{{ route('admin.proyectos.edit', $proyecto->id) }}"
                                                            class="btn btn-icon btn-light">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('admin.proyectos.destroy', $proyecto->id) }}"
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
                            @else
                                <p class="text-light">No hay proyectos aún.</p>
                            @endif
                        </div>
                    </div>
                </div>
                {!! $proyectos->links() !!}
            </div>
        </div>
    </div>

@endsection
