<?php
    //Para obtener las categorias y el usuario
    use App\Models\User;
    use App\Http\Controllers\CategoriaController;

    $categorias=CategoriaController::getAll();

?>

<div class="box box-info padding-2">
    <div class="box-body">
        
        <div class="form-group text-white mb-3">
            {{ Form::label('Nombre Receta') }}
            {{ Form::text('nombre', $receta->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group text-white mb-3">
            {{ Form::label('ingredientes') }}
            {{ Form::text('ingredientes', $receta->ingredientes, ['class' => 'form-control' . ($errors->has('ingredientes') ? ' is-invalid' : ''), 'placeholder' => 'Ingredientes']) }}
            {!! $errors->first('ingredientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group text-white mb-3">
            {{ Form::label('Imagen') }}
            {{ Form::text('id_imagen', $receta->id_imagen, ['class' => 'form-control' . ($errors->has('id_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Id Imagen']) }}
            {!! $errors->first('id_imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group text-white mb-3">
            {{ Form::label('Categoría') }}<br>
            <!-- {{ Form::select('id_categoria',$categorias,['class' => 'form-select text-morado' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'value' => $categorias]) }} -->
            {{ Form::select('id_categoria',$categorias,null, ['class' => 'form-select text-morado']) }}
        </div>
        <div class="form-group text-white mb-3">
            {{ Form::label('preparacion') }}
            {{ Form::text('preparacion', $receta->preparacion, ['class' => 'form-control' . ($errors->has('preparacion') ? ' is-invalid' : ''), 'placeholder' => 'Preparacion']) }}
            {!! $errors->first('preparacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group text-white ">
            {{ Form::hidden('id_usuario',Auth::id(), ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => auth()->user()->name,'value' => Auth::id(),'readonly']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-morado fw-bold">{{ __('ENVIAR') }}</button>
    </div>
</div>