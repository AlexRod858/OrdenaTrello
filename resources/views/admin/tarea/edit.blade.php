@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tarea
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('admin.tareas.index') }}"> {{ __('Volver') }}</a>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" style="font-weight: bold;">{{ __('Editar Tarea') }} </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.tareas.update', $tarea->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.tarea.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
