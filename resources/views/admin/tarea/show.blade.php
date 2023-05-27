@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? "{{ __('Show') Tarea" }}
@endsection

@section('content')
    <section class="content container-fluid">
        
            <div class="col-md-12">
                
                <div class="card card text-white bg-dark mb-3">
                    <div class="card-header">
                        <div class="container-fluid border-top border-bottom mb-5 mt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 style="color: coral;">DETALLES DE LA TAREA</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('admin.tareas.index') }}"> {{ __('Volver') }}</a>
                </div>
                    </div>

                    <div class="card-body border border-light">
                        <div class="form-group">
                            <strong class="coral-color">Creador:</strong>
                            {{ $tarea->proyecto->user->name }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Descripcion:</strong>
                            {{ $tarea->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Estado:</strong>
                            {{ $tarea->estado }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Realizador:</strong>
                            {{ $tarea->user->name }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Proyecto Id:</strong>
                            {{ $tarea->proyecto_id }}
                        </div>
                        <div class="form-group">
                            <strong class="coral-color">Fecha Limite:</strong>
                            {{ $tarea->fecha_limite }}
                        </div>
                        <style>
                            .coral-color {
                                color: coral;
                            }
                        </style>
                    </div>
                </div>
            </div>
        
    </section>
@endsection
