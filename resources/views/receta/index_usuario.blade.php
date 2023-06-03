@extends('layouts.receta')

<?php

    use App\Models\Foto;
    use App\Models\Receta;

    $fotos=Foto::all();
    $recetas=Receta::all();
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

                <div class="card bg-carbon mt-5">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span class="card_title text-white fw-bold">
                                MIS <span class="text-morado"> RECETAS</span>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recetas.create') }}" class="btn btn-morado btn-sm float-right fw-bold"  data-placement="left">
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
        
                        @foreach ($recetas as $receta)
                            @if($receta->id_usuario==Auth::id())
                                <?php $count++; ?>
                                <div class="card mb-3 bg-carbon" style="max-width: 900px;">
                                    <div class="row ">

                                        <div class="col-md-4">
                                            @foreach($fotos as $foto)
                                                @if($foto->id==$receta->id_imagen)
                                                    <img src="assets/galeria/{{$foto->nombre}}" class="img-fluid rounded-start" alt="Foto Receta">        
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title text-white fw-bold">{{$receta->nombre}}</h5>
                                                <p class="card-text text-white">{{$receta->ingredientes}}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            
                                            <form action="{{ route('recetas.destroy',$receta->id) }}" method="POST">
                                                <a class="btn btn-sm btn-morado fw-bold" href="{{ route('recetas.show',$receta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-light text-morado fw-bold" href="{{ route('recetas.edit',$receta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach

                        @if($count==0)

                            <h3 class="text-white">Vaya parece que todavía no has subido ninguna receta.</h3><br>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br>
@endsection
