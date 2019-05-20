@extends('layouts.app')

@section('tittle')
    <title>{{ __('Ingredientes - ')}}{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
    <div class="container">
        <h1>Registro de <span>Ingredientes<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4">
                    <div class="card-body">
                        <form method="POST" action="{{url('/ingredients')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="nombre" type="text" placeholder="{{ __('Nombre') }}" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
        
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="proveedor" type="text" placeholder="{{ __('Proveedor') }}" class="form-control @error('proveedor') is-invalid @enderror" name="proveedor" value="{{ old('proveedor') }}" required autocomplete="proveedor">
    
                                    @error('proveedor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
         <h1>Listado de <span>Ingredientes<span></h1>   
            <div class="table-responsive-md text-center">
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($ingredientes as $ingrediente)    
                      <tr>
                        <th scope="row">{{$ingrediente->codigo}}</th>
                        <td>{{$ingrediente->nombre}}</td>
                        <td>{{$ingrediente->proveedor}}</td>
                        <td><a href="{{url('/ingredients/'.$ingrediente->codigo.'/edit')}}">Actualizar</a></td>
                      </tr>
                    {{-- @else
                        <tr>
                            <td col="4">No hay Registros en la Bd</td>
                          </tr> --}}
                    @endforeach 
                    </tbody>
                  </table>   
                  </div>
    </div>

@endsection