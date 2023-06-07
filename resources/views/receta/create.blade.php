@extends('layouts.receta_admin')

@section('template_title')
    {{ __('Create') }} Receta
@endsection

@section('content')
    
    <section class="content container-fluid">
        <div class="row mb-0">
            <div class="col-md-0 w-auto h-auto bg-transparent position-relative start-50 translate-middle">
                <img src="/assets/images/logo.png" alt="" width="175px" height="100px">
            </div>         
        </div>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default bg-carbon">
                    <div class="card-header">
                        <span class="card-title text-white fw-bold">{{ __('CREANDO') }} <span class="text-morado">RECETA</span></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('recetas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('receta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
