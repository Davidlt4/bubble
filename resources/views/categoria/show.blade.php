@extends('layouts.categoria')

@section('template_title')
    {{ $categoria->nombre ?? " Vista Categoría" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-carbon">

                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title text-white fw-bold">{{$categoria->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-morado fw-bold" href="{{ route('categorias.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group text-white">
                            <strong class="sombreado">Nombre</strong><br>
                            {{ $categoria->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
