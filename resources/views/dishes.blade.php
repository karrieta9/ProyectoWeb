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

                            <div class="form-group row">
                                 <div class="col-md-12">
                                        <h6>Ingredientes: </h6>

                                        @foreach($ingredientes as $ingrediente)
                                         <div class="form-check pb-4">
                                            <input type="checkbox" class="form-check-input" id="{{'ingrediente'}}{{$ingrediente->codigo}}" value="{{$ingrediente->codigo}}" name="{{'ingrediente'}}{{$ingrediente->codigo}}"  onChange="comprobar(this,{{$ingrediente->codigo}});">
                                            <label class="form-check-label" for="{{'ingrediente'}}{{$ingrediente->codigo}}">{{$ingrediente->nombre}}</label>
                                            <input id="{{'cantidad'}}{{$ingrediente->codigo}}" type="text" placeholder="{{ __('Cantidad') }}" class="form-control @error('valor') is-invalid @enderror" name="cantidad[]" value="{{ old('cantidad') }}" required autocomplete="cantidad" disabled>
                                        </div>
                                        @endforeach

                                          

                                              {{-- <select multiple class="form-control" id="exampleFormControlSelect2" name="select">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                  </select>       --}}
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

        {{-- <div class="table-responsive mt-5">
            <h1>Listado de <span>Ingredientes<span></h1>
            <table style="border: 1px solid #dee2e6;" class="table table-hover text-center mt-3">
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
                        <td><a class="btn-link" href="{{url('/ingredients/'.$ingrediente->codigo.'/edit')}}">Actualizar</a></td>
                    </tr> --}}
                {{-- @else
                    <tr>
                        <td col="4">No hay Registros en la Bd</td>
                        </tr> --}}
                    {{-- @endforeach 
                </tbody>
            </table>  
            {{$ingredientes->links()}} 
        </div> --}}
    </div>

@endsection