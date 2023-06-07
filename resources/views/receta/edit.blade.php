@extends('layouts.receta_admin')

@section('template_title')
    {{ __('Update') }} Receta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="row mb-0">
                    <div class="col-md-0 w-auto h-auto bg-transparent position-relative start-50 translate-middle">
                        <img src="/assets/images/logo.png" alt="" width="175px" height="100px">
                    </div>         
                </div>

                <div class="card card-default bg-carbon">
                    <div class="card-header d-flex justify-content-between">
                       <div class="float-left">
                            <span class="card-title text-white fw-bold">{{ __('Actualizar') }} <span class="text-morado">Receta</span></span>
                       </div>
                        <div class="float-right">
                            <a class="btn btn-morado fw-bold" href="{{ route('recetas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('recetas.update', $receta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('receta.edit_form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
