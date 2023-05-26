@extends('layouts.receta')

@section('template_title')
    {{ __('Create') }} Receta
@endsection

@section('content')
    <section class="content container-fluid">
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
