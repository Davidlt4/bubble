<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group text-white">
            <!-- {{ Form::label('nombre') }}
            {{ Form::text('nombre', $foto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!} -->
            {{ Form::label('Imagen') }}
            {{Form::file('imagen')}}
        </div>

        <div class="form-group">
            {{ Form::hidden('nombre',null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),'value' => null]) }}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-morado fw-bold">{{ __('Subir foto') }}</button>
    </div>
</div>