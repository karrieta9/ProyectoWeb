@extends('layouts.login_register')

@section('tittle')
    <title>{{ __('Inicio Sesion - ')}}{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-11">
            <div class="card px-5 py-4">
                <h2 class="p-4">{{ __('Inicio de ') }}<span>Sesion</span></h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="username" type="text" placeholder="{{ __('Usuario o Correo')}}" class="form-control @error('username') is-invalid  @enderror @error('email') is-invalid @enderror" name="username" value="{{ old('username') ?: old('email') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="{{ __('Contraseña') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="m-1">
                            <div class=" row">
                                <div class="col-md-6 col-sm-12  m-0">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Recuerda Me') }}
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-3 mt-md-0 m-0 text-md-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu Contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> 
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-12 mt-3 mx-auto">
                                <button type="submit" class="btn btnSubmit">
                                    {{ __('Iniciar') }}
                                </button>
                            </div>
                        </div>

                        <hr>
                        <div class="register form-group col-md-6">
                            <p class="">Nuevo aqui? <a href="{{ route('register') }}" class="btn-link">Registrate<a></p>
                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
