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
        
    <div class="container secciones row d-flex justify-content-between">
        <a href="{{ url('ingredients') }}" class="imagen col-8 col-md-6 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Creacion Y Actualizacion De Ingredientes</h2></div>
        </a> 
        
        <a href="" class="imagen col-8 col-md-6 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Creacion Y Actualizacion De Platos</h2></div>
        </a>

        <a href="" class="imagen col-8 col-md-6 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Creacion Y Actualizacion De Ordenes</h2></div>
        </a>

        <a href="" class="imagen col-8 col-md-6 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Liquidacion Y Cierre De Ordenes</h2></div>
        </a>

        <a href="" class="imagen col-8 col-md-8 col-lg-2 mb-4 mb-lg-0">
            <div class="info"><h2>Listado De Ventas</h2></div>
        </a>
        
    </div>
</div>
@endsection
