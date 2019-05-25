@extends('layouts.app')

@section('tittle')
    <title>{{ __('Platos - ')}}{{ config('app.name', 'Laravel') }}</title>
    <script>
    function comprobar(obj,cod)
    {   
        if (obj.checked)
            document.getElementById('cantidad'+cod).disabled = false;
        else
            document.getElementById('cantidad'+cod).disabled = true;
    }
    </script>
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
        <h1>Registro de <span>Platos<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4 mb-3">
                    <div class="card-body pb-0">
                        <form method="POST" action="{{url('/platos')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="nombre" type="text" placeholder="{{ __('Nombre') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  required autocomplete="nombre" autofocus>
        
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="valor" type="text" placeholder="{{ __('Valor') }}" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor') }}" required autocomplete="valor">
    
                                    @error('valor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <h6>Ingredientes: </h6>
                            @error('ingrediente' )
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('cantidad.*' )
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group row">
                                @forelse($ingredientes as $ingrediente)
                                <div class="col-lg-3 col-md-4 col-sm-6 pr-0">
                                    <div class="form-check pb-4 ">
                                        <input type="checkbox" class="form-check-input" id="{{'ingrediente'}}{{$ingrediente->codigo}}" value="{{$ingrediente->codigo}}" name="ingrediente[]"  onChange="comprobar(this,{{$ingrediente->codigo}});">
                                        <label class="form-check-label" for="{{'ingrediente'}}{{$ingrediente->codigo}}">{{$ingrediente->nombre}}</label>
                                        <input id="{{'cantidad'}}{{$ingrediente->codigo}}" type="text" placeholder="{{ __('Cantidad') }}" class="form-control" name="cantidad[]"  required autocomplete="cantidad" value="{{ old('cantidad.*') }}" disabled>
                                    </div>
                                </div>
                                @empty
                                <div class="form-check pl-4">
                                    <li class="info_bd">No hay Registro en Base de Datos Ingredientes</li>
                                 </div>
                                @endforelse   
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-12 mt-3 mx-auto">
                                    <button type="submit" class="btn btnSubmit">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
        
                            <hr>
                        </form>
                    </div>
                </div>
            </div>  
        </div>

        <div class="table-responsive mt-5">
            <h1>Listado de <span>Platos<span></h1>
            <table style="border: 1px solid #dee2e6;" class="table table-hover text-center  mt-3">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ingredientes</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($platos as $plato)    
                    <tr>
                        <th scope="row">{{$plato->codigo}}</th>
                        <td>{{$plato->nombre}}</td>
                        <td>
                        @for($i=0 ; $i < count($plato->ingredientes); $i++)     
                            {{$plato->ingredientes[$i]['nombre']}}, Cantidad: {{$plato->ingredientes[$i]['pivot']['cantidad']}} <br>
                        @endfor    
                        </td>
                        <td>${{$plato->valor}}</td>
                        <td><a class="btn-link" href="{{url('/platos/'.$plato->codigo.'/edit')}}">Actualizar</a></td>
                    </tr> 
                    @empty
                    <tr><td colspan="5">No hay Registro en Base de Datos Platos</td></tr>
                    @endforelse    
                </tbody>     
            </table>  
           
            {{$platos->links()}}
           
        </div>
    </div>

@endsection