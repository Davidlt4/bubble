@extends('layouts.foto')

@section('template_title')
    Foto
@endsection

@section('content')
    <br><br>
    <div class="container-fluid mt-4">
        <div class="heading-section">
            <h4><em>Zona </em> Fotos <em>Administrador</em></h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-carbon">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span class="card_title text-white">
                                {{ __('Fotos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('subirfoto') }}" class="btn btn-morado fw-bold btn-sm float-right"  data-placement="left">
                                  {{ __('SUBIR FOTO A LA GALERÍA') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead sombreado text-white">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Nombre</th>

                                        <th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fotos as $foto)
                                        <tr>
                                            
                                            <td class="text-white">{{ $foto->id }}</td>
                                            
											<td class="text-white w-50">{{ $foto->nombre }}</td>

                                            <td class="text-white"><img class="img-fluid" src="assets/galeria/{{$foto->nombre}}" alt="Foto Receta"></td>

                                            <td class="text-white w-50"></td>

                                            <td>
                                                <form action="{{ route('fotos.destroy',$foto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-light text-morado fw-bold mb-2" href="{{ route('fotos.edit',$foto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $fotos->links() !!}
            </div>
        </div>
    </div>
@endsection
