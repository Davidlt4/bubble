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

?>

@section('content')
    <br><br>
    <div class="container-fluid mb-5">
        <div class="heading-section">
            <h4><em>Zona </em> Recetas <em>Administrador</em></h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-carbon">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span class="card_title text-white fw-bold">
                                {{ __('RECETAS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recetas.create') }}" class="btn btn-morado btn-sm float-right fw-bold"  data-placement="left">
                                  {{ __('CREAR RECETA') }}
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
