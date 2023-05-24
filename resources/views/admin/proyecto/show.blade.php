@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? "{{ __('Show') Proyecto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title" style="font-weight: bold;">{{ __('Detalles') }} </span>
                        </div>
                        <div class="float-right">
                            <div class="d-inline-block">
                                <a class="btn btn-primary" href="{{ route('admin.proyectos.index') }}"
                                    style="float: right;">
                                    {{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $proyecto->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Creación:</strong>
                            {{ $proyecto->created_at }}
                        </div>

                    </div>

                </div>


                <div class="text-right">
                    <div style="float:right;">
                        <a href="{{ route('admin.tarea.create', ['proyecto_id' => $proyecto->id]) }}"
                            class="btn btn-warning btn-sm float-right" data-placement="left">
                            {{ __('Nueva Tarea') }}
                        </a>
                    </div>
                </div>



            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
    @if (count($tareas))
        <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>
                    <th>No.</th>
                    <th>Descripción de las Tareas</th>
                    <th>Estado</th>
                    <th>Fecha Límite</th>
                    <th>Asignado a:</th>
                    <th></th>
                </tr>
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
                            <div class="btn-group">
                                <a class="btn btn-sm btn-success" href="{{ route('admin.tareas.edit', $proyecto->id) }}">
                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                </a>
                                <form action="{{ route('admin.proyectos.destroy', $proyecto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                    </button>
                                </form>
                            </div>
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