@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? "{{ __('Show') Proyecto" }}
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                </div>
                <div class="card card text-white bg-dark mb-3">
                    <div class="card-header">

                        <div class="container-fluid border-top border-bottom mb-5 mt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 style="color: coral;">DETALLES DEL PROYECTO</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-inline-block">
                                <a class="btn btn-primary" href="{{ route('proyectos.index') }}"
                                    style="float: right;">
                                    {{ __('Volver') }}</a>
                            </div>

                        </div>

                    </div>


                    <div class="card-body border border-light">

                        <div class="form-group">
                            <strong class="coral-color">Titulo:</strong>
                            {{ $proyecto->titulo }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Fecha Creación:</strong>
                            {{ $proyecto->created_at }}
                        </div>

                    </div>

                </div>



            </div>
        </div>

        <div class="table-responsive">
            @if (count($tareas))
                <table class="table table-dark table-hover border border-light">
                    <thead class="thead">
                        <tr>
                            <th class="coral-color">No.</th>
                            <th class="coral-color">Descripción de la tarea</th>
                            <th class="coral-color">Estado</th>
                            <th class="coral-color">Fecha Límite</th>
                            <th class="coral-color">Asignado a:</th>
                            <th class="coral-color"></th>
                        </tr>
                        <style>
                            .coral-color {
                                color: coral;
                            }
                        </style>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($tareas as $tarea)
                            <tr>
                                <td>{{ ++$count }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>{{ $tarea->estado }}</td>
                                <td>{{ $tarea->fecha_limite }}</td>
                                <td>{{ $tarea->user->name }}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay tareas para este proyecto.</p>
            @endif
        </div>
        </div>
        </div>
    </section>
@endsection
