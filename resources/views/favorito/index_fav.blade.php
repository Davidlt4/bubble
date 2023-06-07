@extends('layouts.receta')

<?php

    use App\Models\Foto;
    use App\Models\Receta;
    use App\Models\Favorito;
    use Illuminate\Support\Facades\Auth;

    $fotos=Foto::all();
    $recetas=Receta::all();
    $favoritos=Favorito::all();

    $misfavoritos=[];
    foreach($favoritos as $fav){

        if($fav->id_usuario==Auth::id()){
            array_push($misfavoritos,$fav);
        }
    }
    // dd($recetas);
    $count=0;

?>

@section('template_title')
    Receta
@endsection

@section('content')

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-12">

                <div class="d-flex justify-content-center">
                    <h4 class="sombreado"><a class="m-3" href="{{route('misRecetas')}}">MIS RECETAS </a> | <a class="m-3" href="{{route('misFavoritos')}}"> FAVORITOS</a></h4>
                </div>

                <div class="card bg-carbon mt-5">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span class="card_title text-white fw-bold">
                                MIS <span class="text-morado"> RECETAS</span>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('crearReceta') }}" class="btn btn-morado btn-sm float-right fw-bold"  data-placement="left">
                                  SUBIR NUEVA RECETA
                                </a>
                             </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
        
                        @foreach ($misfavoritos as $favorito)
                            <?php
                                $receta=Receta::find($favorito->id_receta);
                                $foto=Foto::find($receta->id_imagen);
                                $count++; 
                            ?>
                            <div class="card mb-3 bg-carbon border border-2 border-white">
                                <div class="row row-cols-3">

                                    <div class="col-md-4">
                                        <img src="assets/galeria/{{$foto->nombre}}" class="img-fluid rounded-start" alt="Foto Receta">        
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">

                                            <h3 class="sombreado text-white fw-bold mb-4">{{$receta->nombre}}</h3>
                                            <p class="sombreado text-white fw-bold">Ingredientes</p>
                                            <p class="card-text text-white">{{$receta->ingredientes}}</p>
                                            <p class="sombreado text-white fw-bold">Preparacion</p>
                                            <p class="card-text text-white">{{$receta->preparacion}}</p>
                                            <p class="sombreado text-white fw-bold">Autor</p>
                                            <p class="card-text text-white mb-3">{{Auth::user()->email}}</p>
                                            
                                            <form action="{{ route('delfav',$favorito->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold"><i class="fa-solid fa-heart-crack"></i> {{ __('Eliminar de favoritos') }}</button>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                        @if($count==0)

                            <h3 class="text-white">Vaya parece que todavía no has guardado ninguna receta.</h3><br>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br>
@endsection
