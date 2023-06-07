@extends('layouts.categoria')

@section('template_title')
    Categoria
@endsection

@section('content')
    <div class="container-fluid">
        <div class="heading-section mt-5">
            <h4><em>Zona </em> Categorías <em>Administrador</em></h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-carbon">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span class="card_title text-white fw-bold">
                                {{ __('CATEGORÍAS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-morado btn-sm float-right fw-bold"  data-placement="left">
                                  {{ __('CEAR CATEGORÍA') }}
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
                                <thead class="thead text-white sombreado">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td class="text-white"> {{ $categoria->id }}</td>
                                            
											<td class="text-white">{{ $categoria->nombre }}</td>

                                            <td>
                                                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-morado fw-bold mb-2" href="{{ route('categorias.show',$categoria->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-light text-morado fw-bold mb-2" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fw-bold mb-2"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categorias->links() !!}
            </div>
        </div>
    </div>
@endsection
