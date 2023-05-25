@extends('layouts.app')

@section('template_title')
    {{ $receta->name ?? "{{ __('Show') Receta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Receta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recetas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $receta->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ingredientes:</strong>
                            {{ $receta->ingredientes }}
                        </div>
                        <div class="form-group">
                            <strong>Id Imagen:</strong>
                            {{ $receta->id_imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            {{ $receta->id_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Preparacion:</strong>
                            {{ $receta->preparacion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $receta->id_usuario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
