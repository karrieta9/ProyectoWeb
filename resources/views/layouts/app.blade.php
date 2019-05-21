<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('tittle') 

    <link rel="icon" href="{{{ asset('img/favicon.ico') }}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top py-1 mb-2">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/home') }}">{{ __('Fast Food') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-center links " id="navbarSupportedContent">
                    @if(! Route::is('home'))
                    <div class="navbar-nav m-auto">
                        <a class="nav-item navb-link {{! Route::is('home') ?: 'active'}} " href="{{ route('home') }}">Inicio</a>
                        <a class="nav-item navb-link {{!Route::is('ingredients*') ?: 'active'}} " href="{{ url('ingredients') }}">Ingredientes</a>
                        <a class="nav-item navb-link {{!Route::is('dishes*') ?: 'active'}} " href="{{ url('dishes') }}">Platos</a>
                        <a class="nav-item navb-link {{!Route::is('ingredients') ?: 'active'}} " href="#">Ordenes</a>
                        <a class="nav-item navb-link {{!Route::is('ingredients') ?: 'active'}} " href="#">Cierre/Liquidacion</a>
                        <a class="nav-item navb-link {{!Route::is('ingredients') ?: 'active'}} " href="#">Ventas</a>
                        {{-- <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="navb-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>DropDown</a>
                            <div class="dropdown-menu dropdown-menu-right text-center m-auto" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}
                                </a>
                            </div>
                        </div> --}}
                        
                        
                    </div>
                    @endif
                    <div class="navbar-nav links ml-auto">
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="navb-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right text-center m-auto" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    
    <footer class="navbar-dark bg-dark py-4 mt-5">
        <div class="container row m-auto">
            <div class="info col-md-6 py-3 px-5">
            <h3>Fast Food</h3>    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores neque quia fuga, quam architecto explicabo hic quaerat suscipit corrupti minima quisquam, ipsa commodi aspernatur doloremque animi quidem repudiandae sapiente error!aspernatur doloremque animi quidem repudiandae sapiente error!</p>
            </div>
            <div class="contact col-md-6 py-3 px-5">
            <h3>Contacto</h3>  
            <p>En Barranquilla.<br>
            Telefono: 555 55 55<br>
            Correo: info@fastfood.com<br>
            Fax: 123 456 7890</p>

            </div>
        </div>
    </footer>    
    
    </div>
</body>
</html>

