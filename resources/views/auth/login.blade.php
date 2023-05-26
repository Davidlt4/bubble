@extends('layouts.login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-carbon">
<!--                 
            <div class="container">
                <img src="assets/images/logo.png" class="logo-login">
            </div> -->
                <div class="row mb-0">
                    <div class="col-md-0 w-auto h-auto bg-transparent position-relative start-50 translate-middle">
                        <img src="assets/images/logo.png" alt="" width="175px" height="100px">
                    </div>         
                </div>
                
                <div class="card-body">
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-morado fw-bold">
                                    {{ __('INICIAR SESIÓN') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="link-morado text-white ms-3" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col-md-8 offset-md-4">
        <span class="text-white">
            {{ __('¿No estás registrado? ') }}
        </span>
        @guest
            @if (Route::has('register'))
                <button type="submit" class=" ms-3 btn btn-light text-morado fw-bold">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRATE') }}</a>
                 </button>
            @endif
        @endguest
    </div>
</div>
<br><br><br><br><br><br>

@endsection
