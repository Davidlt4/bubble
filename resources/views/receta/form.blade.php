<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $receta->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ingredientes') }}
            {{ Form::text('ingredientes', $receta->ingredientes, ['class' => 'form-control' . ($errors->has('ingredientes') ? ' is-invalid' : ''), 'placeholder' => 'Ingredientes']) }}
            {!! $errors->first('ingredientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_imagen') }}
            {{ Form::text('id_imagen', $receta->id_imagen, ['class' => 'form-control' . ($errors->has('id_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Id Imagen']) }}
            {!! $errors->first('id_imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_categoria') }}
            {{ Form::text('id_categoria', $receta->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Id Categoria']) }}
            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('preparacion') }}
            {{ Form::text('preparacion', $receta->preparacion, ['class' => 'form-control' . ($errors->has('preparacion') ? ' is-invalid' : ''), 'placeholder' => 'Preparacion']) }}
            {!! $errors->first('preparacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario') }}
            {{ Form::text('id_usuario', $receta->id_usuario, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>