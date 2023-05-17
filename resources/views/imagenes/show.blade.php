@extends('layouts.app')

@section('template_title')
    {{ $imagene->name ?? "{{ __('Show') Imagene" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Imagene</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imagenes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $imagene->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Galeria:</strong>
                            {{ $imagene->galeria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
