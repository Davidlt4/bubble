@extends('layouts.receta')

@section('template_title')
    {{ $foto->nombre ?? " Foto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-carbon">
                    
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ $foto->nombre }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fotos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong class="sombreado">Nombre</strong><br>
                            {{ $foto->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
