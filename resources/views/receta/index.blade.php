@extends('layouts.receta')

@section('template_title')
    Receta
@endsection

<?php

    use App\Models\Categoria;
    use App\Models\User;

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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-white">
                                <thead class="thead text-white sombreado">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>Nombre</th>
										<th>Ingredientes</th>
										<th>Imagen</th>
										<th>Categoria</th>
										<th>Preparacion</th>
										<th>Usuario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recetas as $receta)
                                        <?php 
                                            $categoria=Categoria::find($receta->id_categoria);
                                            $usuario=User::find($receta->id_usuario);
                                        ?>
                                        <tr>
                                            <td class="text-white">{{ $receta->id }}</td>
                                            
											<td class="text-white">{{ $receta->nombre }}</td>
											<td class="text-white">{{ $receta->ingredientes }}</td>
											<td class="text-white">{{ $receta->id_imagen }}</td>
											<td class="text-white">{{ $categoria->nombre }}</td>
											<td class="text-white">{{ $receta->preparacion }}</td>
											<td class="text-white w-50">{{ $usuario->email }}</td>

                                            <td>
                                                <form action="{{ route('recetas.destroy',$receta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-morado mb-2 fw-bold" href="{{ route('recetas.show',$receta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-light text-morado mb-2 fw-bold" href="{{ route('recetas.edit',$receta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fw-bold"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recetas->links() !!}
            </div>
        </div>
    </div><br><br>
@endsection
