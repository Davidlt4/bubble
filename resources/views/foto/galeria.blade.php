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
            @if (Route::has('masfoto'))
                <button type="submit" class=" ms-3 btn btn-morado fw-bold">
                    <a class="nav-link" href="{{ route('masfoto') }}">{{ __('PINCHA AQUÍ') }}</a>
                </button>
            @endif
        </div>
    </div>
    <!---->
    
    <!-- Gallery -->
    <div class="row">


        @for($i=0; $i < count($fotos); $i+=6)

            @if($i != count($fotos)-1)
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                        src="{{$fotos[$i%count($fotos)]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />

                        <img
                        src="{{$fotos[($i+1)%count($fotos)]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Wintry Mountain Landscape"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{$fotos[$i+2]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{$fotos[$i+3]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Boat on Calm Water"
                        />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{$fotos[$i+4]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Waves at Sea"
                        />

                        <img
                        src="{{$fotos[$i+5]}}"
                        class="w-100 shadow-1-strong rounded mb-4"
                        alt="Yosemite National Park"
                        />
                    </div>
            @endif
    
        @endfor

    </div>
    
    <br><br><br><br><br><br>
<!-- Gallery -->
@endsection
