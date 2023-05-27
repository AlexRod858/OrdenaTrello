@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Proyecto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card text-white bg-dark mb-3">
                    <div class="card-header">
                        <div class="container-fluid border-top border-bottom mb-5 mt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 style="color: coral;">NUEVO PROYECTO</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-inline-block">
                                <a class="btn btn-primary" href="{{ route('admin.proyectos.index') }}" style="float: right;">
                                    {{ __('Volver') }}</a>
                            </div>
        
                        </div>
                    </div>
                    <div class="card-body border border-light">
                        <form method="POST" action="{{ route('admin.proyectos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.proyecto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
