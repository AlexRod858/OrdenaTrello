<div class="box box-info padding-1">
    <div class="box-body" style="color: coral;">

    
            <div class="form-group">
                {{ Form::label('descripción') }}
                {{ Form::textarea('descripcion', $tarea->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Subir logo en página principal...']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                <label for="realizador">Realizador:</label>
                <select name="realizador" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $tarea->realizador_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                {{ Form::label('proyecto_id') }}
                {{ Form::text('proyecto_id', $tarea->proyecto_id, ['class' => 'form-control' . ($errors->has('proyecto_id') ? ' is-invalid' : ''), 'readonly' => true]) }}
                {!! $errors->first('proyecto_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('fecha_limite') }}
                {{ Form::date('fecha_limite', $tarea->fecha_limite, ['class' => 'form-control' . ($errors->has('fecha_limite') ? ' is-invalid' : '')]) }}
                {!! $errors->first('fecha_limite', '<div class="invalid-feedback">:message</div>') !!}
            </div>

    </div>

    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="form-group" style="color: coral;">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::select('estado', ['pendiente' => 'Pendiente', 'en proceso' => 'En Proceso', 'completado' => 'Completado'], $tarea->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn" style="background-color: coral; color: white">{{ __('Confirmar') }}</button>
    </div>


</div>
</div>
