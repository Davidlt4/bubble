@extends('layouts.receta')

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
            @foreach($categorias as $categoria)
                <a class="text-morado bg-white text-center fw-bold p-3 rounded-2" href="#">{{$categoria->nombre}}</a>
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
                            <div class="col-lg-12">
                                    @foreach ($recetas as $receta)
                                        <?php 
                                            $categoria=Categoria::find($receta->id_categoria);
                                            $usuario=User::find($receta->id_usuario);
                                            $foto=Foto::find($receta->id_imagen);
                                        ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="item">
                                                <img src="assets/galeria/{{$foto->nombre}}" alt="Foto Receta">        
                                                <h4 class="sombreado">{{$receta->nombre}}<span>{{$usuario->email}}</span></h4>
                                                <a class="btn btn-sm btn-morado mb-2 mt-2 fw-bold" href="{{ route('recetas.show',$receta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('VER RECETA') }}</a>
                                                <ul>
                                                    <li><i class="fa fa-star"></i> 4.8</li>
                                                </ul>
                                            </div>
                                        </div>

                                    @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br><br>
@endsection
