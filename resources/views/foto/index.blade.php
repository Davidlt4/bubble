@extends('layouts.receta')

@section('template_title')
    Foto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-carbon">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title text-white">
                                {{ __('Fotos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('fotos.create') }}" class="btn btn-morado fw-bold btn-sm float-right"  data-placement="left">
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
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fotos as $foto)
                                        <tr>
                                            
                                            <td>{{ $foto->id }}</td>
                                            
											<td>{{ $foto->nombre }}</td>

                                            <td>
                                                <form action="{{ route('fotos.destroy',$foto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-light text-morado fw-bold" href="{{ route('fotos.edit',$foto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
