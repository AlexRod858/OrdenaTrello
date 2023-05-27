<div class="box box-info padding-1">
    <div class="box-body" style="color: coral;">
        
        <div class="form-group ">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $proyecto->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Página web...']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $proyecto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Es un proyecto para...']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $proyecto->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id', 'readonly' => true]) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn" style="background-color: coral; color: white">{{ __('Confirmar') }}</button>
    </div>
</div>