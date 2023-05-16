@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Proyecto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="d-inline-block">
                    <a class="btn btn-primary" href="{{ route('admin.proyectos.index') }}"
                        style="float: right;">
                        {{ __('Volver') }}</a>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Proyecto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proyectos.update', $proyecto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.proyecto.form_edit')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
