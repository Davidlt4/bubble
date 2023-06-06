@extends('layouts.categoria')

@section('template_title')
    Receta
@endsection

<?php

    use App\Models\Categoria;
    use App\Models\User;
    use App\Models\Foto;
    use App\Models\Receta;

    $recetas=Receta::all();
    $categorias=Categoria::all();

?>

@section('content')
    <br><br>
    <div class="container-fluid mb-5">
        <div class="heading-section d-flex justify-content-around mb-5">
            <!--Categorias-->
            <span class="sombreado text-white h-50">|</span>
            @foreach($categorias as $cat)
                <a class="text-white sombreado text-center fw-bold" href="{{route('verCategoria',$cat->id)}}">{{$cat->nombre}}</a>
                <span class="sombreado text-white h-50">|</span>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-carbon">

                    <div class="card-header">
                        <h4>Recetas <span class="text-morado">Populares</span></h4>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            @foreach ($recetas as $receta)
                                
                                @if($receta->id_categoria==$categoria->id)

                                    <?php 
                                        $usuario=User::find($receta->id_usuario);
                                        $foto=Foto::find($receta->id_imagen);
                                    ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="/assets/galeria/{{$foto->nombre}}" alt="Foto Receta">        
                                            <h4 class="sombreado">{{$receta->nombre}}<span>{{$usuario->name}}</span></h4><br>
                                            <a class="btn btn-sm btn-morado mb-2 mt-2 fw-bold" href="{{ route('verRecetaIni',$receta->id) }}">{{ __('VER RECETA') }}</a>
                                            <ul>
                                                <form method="POST" action="{{route('fav')}}" role="form" enctype="multipart/form-data">
                                                    @csrf
                                                    {{ Form::hidden('id_usuario',$usuario->id, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''),'value' => null]) }}
                                                    {{ Form::hidden('id_receta',$receta->id, ['class' => 'form-control' . ($errors->has('id_receta') ? ' is-invalid' : ''),'value' => null]) }}
                                                    <button type="submit" class="btn btn-morado"><i class="fa fa-star"></i></button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>

                                @endif

                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br><br>
@endsection
