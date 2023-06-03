@extends('layouts.receta')

@section('template_title')
    {{ __('Subir') }} Foto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default bg-carbon">


                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title text-white fw-bold">{{ __('Subir') }} <span class="text-morado">Foto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-morado fw-bold" href="{{ route('galeria') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('fotos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('foto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br>
@endsection
