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
        <h1>Liquidacion Y <span>Cierre<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4 mb-3">
                    <div class="card-body pb-0">
                        <form method="GET" action="{{url('/liquidacion/{mesa}/edit')}}">
                            {{-- @csrf --}}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="mesa" type="text" placeholder="{{ __('N° Mesa') }}" class="form-control @error('mesa') is-invalid @enderror" name="mesa" value="{{ old('mesa') }}" required autocomplete="mesa">
    
                                    @error('mesa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <h6>Platos: </h6>

                          {{-- @foreach($mesa as $me) 
                        <h1>{{$me->Numero}}</h1>
                        <h1>{{$me->Fecha}}</h1>
                        <h1>{{$me->Mesa}}</h1>
                        <h1>{{$me->Estado}}</h1>

                        <h1>{{$me->platos}}</h1>
                        {{-- <h1>{{$me->Estado}}</h1> --}}
                          {{--@endforeach --}}
                           
                            
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

        
    </div>

@endsection