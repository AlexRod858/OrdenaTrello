@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? "{{ __('Show') Tarea" }}
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
                            <a class="btn btn-primary" href="{{ route('tareas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Creador:</strong>
                            {{ $tarea->proyecto->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tarea->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tarea->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Realizador:</strong>
                            {{ $tarea->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto Id:</strong>
                            {{ $tarea->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Limite:</strong>
                            {{ $tarea->fecha_limite }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
