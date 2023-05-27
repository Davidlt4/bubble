@extends('layouts.receta')

@section('template_title')
    {{ $receta->nombre  ?? "Vista Receta" }}
@endsection

<?php

    use App\Models\Categoria;
    use App\Models\User;

    $categoria=Categoria::find($receta->id_categoria);
    $usuario=User::find($receta->id_usuario);

?>

@section('content')
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="row mb-0">
                    <div class="col-md-0 w-auto h-auto bg-transparent position-relative start-50 translate-middle">
                        <img src="/assets/images/logo.png" alt="" width="175px" height="100px">
                    </div>         
                </div>

                <div class="card bg-carbon">

                    <div class="card-header d-flex justify-content-between">

                        <div class="float-left">
                            <span class="card-title text-white fw-bold">{{ __('Datos de la ') }} <span class="text-morado">Receta</span></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-morado fw-bold" href="{{ route('recetas.index') }}"> {{ __('Volver') }}</a>
                        </div>

                    </div>

                    <div class="card-body">
                        
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Nombre</strong><br>
                            {{ $receta->nombre }}
                        </div>
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Ingredientes</strong><br>
                            {{ $receta->ingredientes }}
                        </div>
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Imagen</strong><br>
                            {{ $receta->id_imagen }}
                        </div>
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Categoria</strong><br>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Preparacion</strong><br>
                            {{ $receta->preparacion }}
                        </div>
                        <div class="form-group text-white mb-2">
                            <strong class="sombreado">Usuario</strong><br>
                            {{ $usuario->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
