@extends('layouts.app')

@section('tittle')
    <title>{{ __('Cierre y Liquidacion - ')}}{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
    <div class="container">
        @if (session('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ session('Mensaje') }}
            </div>
        @endif
    </div>
    
    <div class="container">
        <h1>Liquidacion Y <span>Cierre2<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4 mb-3">
                    <div class="card-body pb-0">
                        <form method="GET" action="{{url('/liquidacion')}}">

                            @foreach($mesa as $me)        
                        <h6>Informacion: </h6>
                        <label>Numero de Orden: {{$me->Numero}}</label><br>
                        <label>Numero de Mesa: {{$me->Mesa}}</label><br>
                        <label>Fecha: {!! \Carbon\Carbon::parse($me->Fecha)->format('d-m-Y') !!}</label><br>
                        <label>Estado: {{$me->Estado}}</label><br>
                        <h6>Platos: </h6>
                            @for($i=0 ; $i < count($me->platos); $i++)     
                                {{$me->platos[$i]['nombre']}}, Cantidad: {{$me->platos[$i]['pivot']['cantidad']}}, Valor: {{$me->platos[$i]['valor']}} <br>
                            @endfor 
    
                          @endforeach
                           
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12 mt-3 mx-auto">
                                    <button type="submit" class="btn btnSubmit">
                                        {{ __('Cerrar') }}
                                    </button>
                                </div>
                            </div>
        
                            <hr>
                        </form>
                    </div>
                </div>
            </div>  
        </div>

        
    </div>

@endsection