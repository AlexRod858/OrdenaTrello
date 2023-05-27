<div class="box box-info padding-1">
    <div class="box-body">

        
    <!-- Agrega campos ocultos para mantener los valores originales de 'descripcion', 'user_id', 'proyecto_id' y 'fecha_limite' -->
    {{ Form::hidden('descripcion', $tarea->descripcion) }}
    {{ Form::hidden('user_id', $tarea->user_id) }}
    {{ Form::hidden('proyecto_id', $tarea->proyecto_id) }}
    {{ Form::hidden('fecha_limite', $tarea->fecha_limite) }}
    {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}

    
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="form-group"style="color: coral;">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::select('estado', ['pendiente' => 'Pendiente', 'en proceso' => 'En Proceso', 'completado' => 'Completado'], $tarea->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="box-footer mt-2">
        <button type="submit" class="btn" style="background-color: coral; color: white">{{ __('Confirmar') }}</button>
    </div>


</div>
</div>
