@extends('layouts.login_register')

@section('tittle')
    <title>{{ __('Restablecimiento Contraseña - ')}}{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-11">
            <div class="card px-5 py-4">
                <h2 class="p-4">{{ __('Restablecimiento de ') }}<span>Contraseña</span></h2>
                <div class="card-body py-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <p>Por Favor Ingresa Tu Correo Para Enviarte Un Enlace De Restablecimiento De Contraseña.</p>      
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="{{ __('Correo') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 mt-3 mx-auto">
                                <button type="submit" class="btn btnSubmit">
                                    {{ __('Restablecer Contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
