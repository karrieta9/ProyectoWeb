@extends('layouts.app')

@section('tittle')
    <title>{{ __('Ventas - ')}}{{ config('app.name', 'Laravel') }}</title>
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
        <h1>Listado de <span>Ventas<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4 mb-3">
                    <div class="card-body pb-0">
                        <form method="GET" action="{{url('/ventas')}}">
                            {{-- @csrf --}}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="fecha" type="date"  class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus>
        
                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-12 mt-3 mx-auto">
                                    <button type="submit" class="btn btnSubmit">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                            </div>
        
                            <hr>
                        </form>
                    </div>
                </div>
            </div>  
        </div>

        <div class="table-responsive mt-1">
            <?php $valor = 0; 
                    $total = 0;?>  
            <table style="border: 1px solid #dee2e6;" class="table table-hover text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">Numero Orden</th>
                        <th scope="col">Mesa</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fecha as $fe) 

                    @for($i=0 ; $i < count($fe->platos); $i++) 
                        <?php $valor = $valor + $fe->platos[$i]['pivot']['Valor']; 
                                ?> 
                     @endfor 

                    <tr>
                        <th scope="row">{{$fe->Numero}}</th>
                        <td>{{$fe->Mesa}}</td>
                        <td>{!! \Carbon\Carbon::parse($fe->Fecha)->format('d-m-Y') !!}</td>
                        <td>{{$fe->Estado}}</td>
                        <td>${{$valor}}</td>
                        <?php 
                        $total = $total + $valor;
                        $valor = 0;
                        ?>
                    </tr>
                    @empty
                    <tr><td colspan="5">No hay Registro con esa Fecha en la Base de Datos Ordenes</td></tr>
                    @endforelse
                    <tr>
                        <th class="text-right" colspan=4>Total Del Dia:</th>
                        <td >${{$total}}</td>
                    </tr>
                </tbody>
            </table>  
            
            
        </div>
    </div>

@endsection