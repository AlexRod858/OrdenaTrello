@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tarea
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="card text-white bg-dark ">


                    <div class="card-header ">
                        <div class="container-fluid border-top border-bottom mb-5 mt-2 ">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 style="color: coral;">EDITAR TAREA</h1>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <a class="btn btn-primary" href="{{ route('admin.tareas.index') }}"
                            >
                            {{ __('Volver') }}</a>
                    </div>
                    <div class="card-body border border-light mt-4">
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
