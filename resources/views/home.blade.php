@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <h1>Bienvenido estas en el Inicio</h1>         
                    <h3>click en el boton de las seccion a la que quieras ir </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
