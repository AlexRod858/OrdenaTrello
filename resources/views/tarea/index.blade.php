@extends('layouts.app')

@section('template_title')
    Tarea
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="font-weight: bold;">
                                {{ __('Mis Tareas Asignadas') }}
                            </span>
                                
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No.</th>

                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Fecha Límite</th>
                                        <th>Creador</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tareas as $tarea)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $tarea->proyecto->titulo }}</td>
                                            <td>{{ $tarea->descripcion }}</td>
                                            <td>{{ $tarea->estado }}</td>
                                            <td>{{ $tarea->fecha_limite }}</td>
                                            <td>{{ $tarea->proyecto->user->name }}</td>

                                            <td>
                                                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('tareas.show', $tarea->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('tareas.edit', $tarea->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Cambiar estado') }}</a>
                                                    {{-- @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tareas->links() !!}
            </div>
        </div>
    </div>
@endsection
