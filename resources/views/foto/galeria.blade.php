@extends('layouts.galeria')

@section('template_title')
    Galería
@endsection

@section('content')

    <!--Boton para añadir-->
    <div class="row mt-3 mb-5">
        <div class="col-md-8 offset-md-4">
            <span class="text-white">
                {{ __('¿Quieres publicar una foto? ') }}
            </span>
            @if (Route::has('subirfoto'))
                <button type="submit" class=" ms-3 btn btn-morado fw-bold">
                    <a class="nav-link" href="{{ route('subirfoto') }}">{{ __('PINCHA AQUÍ') }}</a>
                </button>
            @endif
        </div>
    </div>
    <!---->
    
    <!-- Gallery -->
    <div class="row">


        @foreach($fotos as $foto)

            <div class="col-lg-3 col-md-4 col-xs-6 thumb mb-2">
                <img  src="{{$foto}}" class="zoom img-fluid" alt="">
            </div>

        @endforeach

    </div>
    
    <br><br><br><br><br><br>
<!-- Gallery -->
@endsection
