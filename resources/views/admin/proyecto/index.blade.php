@extends('layouts.app')

@section('template_title')
    Proyecto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="font-weight: bold;">

                                {{ __('Todos mis proyectos') }}

                            </span>



                            <div class="float-right">
                                <a href="{{ route('admin.proyectos.create') }}" class="btn btn-warning btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nuevo Proyecto') }}
                                </a>
                            </div>


                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($proyectos) > 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No.</th>

                                            <th>Nombre de Proyecto</th>
                                            <th>Id del proyecto</th>
                                            <th>Fecha Creación</th>
                                            <th>Nº Tareas</th>
                                            <th>Realizadas</th>
                                            <th></th>
                                        </tr>
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
                                                <td>{{ $proyecto->tareasCompletadas() }} / {{ $proyecto->tareas->count() }}</td>
                                                <td>
                                                    <form action="{{ route('admin.proyectos.destroy', $proyecto->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.proyectos.show', $proyecto->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Ver proyecto') }}</a>
                                                        
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('admin.proyectos.edit', $proyecto->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                            </a>
                                                            <form action="{{ route('admin.proyectos.destroy', $proyecto->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                                </button>
                                                            </form>
                                                        

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
