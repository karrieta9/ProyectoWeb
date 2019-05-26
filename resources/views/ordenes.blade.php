@extends('layouts.app')

@section('tittle')
    <title>{{ __('Ordenes - ')}}{{ config('app.name', 'Laravel') }}</title>
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
        @elseif(session('Info'))
            <div class="alert alert-info" role="alert">
                {{ session('Info') }}
            </div>       
        @endif
    </div>
    
    <div class="container">
        <h1>Registro de <span>Ordenes<span></h1>         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-11 pt-3">
                <div class="card px-5 py-4 mb-3">
                    <div class="card-body pb-0">
                        <form method="POST" action="{{url('/ordenes')}}">
                            @csrf
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
                            @error('plato' )
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
                                @forelse($platos as $plato)
                                <div class="col-lg-3 col-md-4 col-sm-6 pr-0">
                                    <div class="form-check pb-4 ">
                                        <input type="checkbox" class="form-check-input" id="{{'plato'}}{{$plato->codigo}}" value="{{$plato->codigo}}" name="plato[]"  onChange="comprobar(this,{{$plato->codigo}});">
                                        <label class="form-check-label" for="{{'plato'}}{{$plato->codigo}}">{{$plato->nombre}}</label>
                                        <input id="{{'cantidad'}}{{$plato->codigo}}" type="text" placeholder="{{ __('Cantidad') }}" class="form-control" name="cantidad[]"  required autocomplete="cantidad" value="{{ old('cantidad.*') }}" disabled>
                                    </div>
                                </div>
                                @empty
                                <div class="form-check pl-4">
                                    <li class="info_bd">No hay Registro en Base de Datos Platos</li>
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
                <h1>Listado de <span>Ingredientes<span></h1>
                <table style="border: 1px solid #dee2e6;" class="table table-hover text-center mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Platos</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ordenes as $orden)    
                        <tr>
                            <th scope="row">{{$orden->Numero}}</th>
                            <td>{{$orden->Mesa}}</td>
                            <td>
                            @for($i=0 ; $i < count($orden->platos); $i++)     
                                {{$orden->platos[$i]['nombre']}}, Cantidad: {{$orden->platos[$i]['pivot']['cantidad']}},
                                Valor: ${{$orden->platos[$i]['pivot']['Valor']}}  <br>

                            @endfor    
                            </td>
                            <td>{!! \Carbon\Carbon::parse($orden->Fecha)->format('d-m-Y') !!}</td>
                            <td>{{$orden->Estado}}</td>
                            <td><a class="btn-link" href="{{url('/ordenes/'.$orden->Numero.'/edit')}}">Actualizar</a></td>
                        </tr>
                        @empty
                        <tr><td colspan="6">No hay Registro en Base de Datos Ordenes</td></tr>
                        @endforelse
                    </tbody>
                </table>  
                
                {{$ordenes->links()}} 
                
            </div>
    </div>

@endsection