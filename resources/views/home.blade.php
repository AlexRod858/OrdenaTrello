@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div id="example"></div> --}}
    <div class="row justify-content-center">
        {{--  --}}
        <div class="col-md-4 p-5">
            <div class="card text-white bg-dark border border-5" style="height: calc(60vh); border-color: rgb(245, 119, 35)!important;">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="text-center bg-warning rounded-circle" style="height: 150px; width: 150px; background-color: rgb(245, 119, 35)!important; margin-top: -75px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 72px; font-weight: bold;">
                        {{--  --}}
                        {{ $proyectos->count() }}                        
                        {{--  --}}
                        </span>
                    </div>
                    <h3 class="mt-3 text-center">PROYECTOS ABIERTOS</h3>
                </div>
            </div>
        </div>
        
        {{--  --}}
        <div class="col-md-4 p-5">
            <div class="card text-white bg-dark border border-5" style="height: calc(60vh); border-color: rgb(245, 119, 35)!important;">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="text-center bg-warning rounded-circle" style="height: 150px; width: 150px; background-color: rgb(245, 119, 35)!important; margin-top: -75px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 72px; font-weight: bold;">
                            {{ $tareasPendientes }}
                        </span>
                    </div>
                    <h3 class="text-center pt-1">TAREAS FINALIZADAS EN LAS ÚLTIMAS 24H</h3>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="col-md-4 p-5">
            <div class="card text-white bg-dark border border-5" style="height: calc(60vh); border-color: rgb(245, 119, 35)!important;">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="text-center bg-warning rounded-circle" style="height: 150px; width: 150px; background-color: rgb(245, 119, 35)!important; margin-top: -75px; display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 72px; font-weight: bold;">
                            {{ $tareasPendientes }}
                        </span>
                    </div>
                    <h3 class="mt-3 text-center">TAREAS PENDIENTES</h3>
                </div>
            </div>
        </div>
        {{--  --}}
    </div>
</div>
@endsection
