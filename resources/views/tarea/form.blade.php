<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            {{ Form::select('estado', ['pendiente' => 'Pendiente', 'en proceso' => 'En Proceso', 'completado' => 'Completado'], $tarea->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <!-- Agrega un campo oculto para mantener el valor original de 'descripcion' -->
        {{ Form::hidden('descripcion', $tarea->descripcion) }}
        <!-- Agrega campos ocultos para mantener los valores originales de 'user_id' y 'proyecto_id' -->
        {{ Form::hidden('user_id', $tarea->user_id) }}
        {{ Form::hidden('proyecto_id', $tarea->proyecto_id) }}
        <!-- Agrega un campo oculto para mantener el valor original de 'fecha_limite' -->
        {{ Form::hidden('fecha_limite', $tarea->fecha_limite) }}
        
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Confirmar') }}</button>
        </div>
        
    </div>
</div>
