@extends('layouts.receta')

@section('template_title')
    {{ __('Editar') }} Categoria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title text-white fw-bold">Editar <span class="text-morado">Categoría</span></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-morado fw-bold" href="{{ route('categorias.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categoria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
