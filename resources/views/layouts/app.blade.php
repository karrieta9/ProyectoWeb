<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('tittle') 

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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm sticky-top py-1">
            <div class="container">
                <a class="navbar-brand logo m-0" href="{{ url('/home') }}">{{ __('Fast Food') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-center links" id="navbarSupportedContent">
                    <div class="navbar-nav m-auto">
                        <a class="nav-item navb-link active" href="#">Home</a>
                        <a class="nav-item navb-link activo" href="#">Features</a>
                        <a class="nav-item navb-link" href="#">Pricing</a>
                        <a class="nav-item navb-link disabled" href="#">Disabled</a>
                        <a class="nav-item navb-link disabled" href="#">Disabled</a>
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="navb-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>DropDown</a>
                            <div class="dropdown-menu dropdown-menu-right text-center m-auto" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Salir') }}
                                </a>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="navbar-nav links">
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="navb-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
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
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam neque asperiores, deserunt id nobis, quae quos nihil, debitis quam quas corporis amet odio totam facilis officiis hic vitae obcaecati. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae praesentium officiis corrupti cumque repellendus aut, provident fugiat nostrum nihil soluta explicabo deserunt impedit in distinctio amet earum animi aperiam magnam.    
    
    <footer class="navbar-dark bg-dark py-4">
        <div class="container row m-auto">
            <div class="info col-6 py-3 px-5">
            <h3>Fast Food</h3>    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores neque quia fuga, quam architecto explicabo hic quaerat suscipit corrupti minima quisquam, ipsa commodi aspernatur doloremque animi quidem repudiandae sapiente error!aspernatur doloremque animi quidem repudiandae sapiente error!</p>
            </div>
            <div class="contact col-6 py-3 px-5">
            <h3>Contacto</h3>  
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br>
            Telefono: 555 55 55<br>
            Correo: info@fastfood.com<br>
            Fax: 123 456 7890</p>

            </div>
        </div>
    </footer>    
    
    </div>
</body>
</html>

