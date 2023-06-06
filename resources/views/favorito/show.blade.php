@extends('layouts.app')

@section('template_title')
    {{ $favorito->name ?? "{{ __('Show') Favorito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Favorito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('favoritos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $favorito->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Receta:</strong>
                            {{ $favorito->id_receta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
