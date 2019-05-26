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
                           
                        <form method="POST" action="{{url('/liquidacion/'.$mesa[0]->Numero)}}">
                        @csrf
                        {{method_field('PATCH')}}
                        <input type="hidden" value="{{$mesa[0]->Numero}}">   

                        @foreach($mesa as $me)       
                        <h6>Informacion: </h6>
                        <ul>
                            <li>Numero de Orden: {{$me->Numero}}</li>
                            <li>Numero de Mesa: {{$me->Mesa}}</li>
                            <li>Fecha: {!! \Carbon\Carbon::parse($me->Fecha)->format('d-m-Y') !!}</li>
                            <li>Estado: {{$me->Estado}}</li>
                        </ul> 
                        <h6>Platos: </h6>   
                        <ul>
                            @for($i=0 ; $i < count($me->platos); $i++) 
                                <li>{{$me->platos[$i]['nombre']}}, Cantidad: {{$me->platos[$i]['pivot']['cantidad']}}, Valor: ${{$me->platos[$i]['pivot']['Valor']}}</li>    
                                {{-- {{
                                $valor = 0;
                                $valor = $valor + $me->platos[$i]['pivot']['Valor'];
                                }}  --}}
                            @endfor 
                        </ul>
                        @endforeach
                        {{-- total a pagar : {{$valor}}; --}}
                           
                            
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