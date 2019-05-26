@extends('layouts.app')

@section('tittle')
    <title>{{ __('Inicio - ')}}{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')

<div class="container" >
    <div class="card-body p-0">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <h1>Bienvenido Estas En El <span>Inicio</span></h1>         
    <p>Seleccione una seccion: </p>
        
    <div class="container secciones row d-flex justify-content-center  justify-content-md-between">
        <a href="{{ url('ingredients') }}" class="imagen col-7 col-md-5 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Registro Y Actualizacion De Ingredientes</h2></div>
        </a> 
        
        <a href="{{ url('platos') }}" class="imagen col-7 col-md-5 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Registro Y Actualizacion De Platos</h2></div>
        </a>

        <a href="{{ url('ordenes') }}" class="imagen col-7 col-md-5 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Registro Y Actualizacion De Ordenes</h2></div>
        </a>

        <a href="{{ url('liquidacion') }}" class="imagen col-7 col-md-5 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Liquidacion Y Cierre De Ordenes</h2></div>
        </a>

        <a href="{{ url('ventas') }}" class="imagen col-7 col-md-5 col-lg-2 mb-4 mb-lg-0 mx-md-auto mx-lg-0">
            <div class="info"><h2>Listado De Ventas</h2></div>
        </a>
        
    </div>
</div>
@endsection
