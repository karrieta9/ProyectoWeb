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
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top py-1 mb-4">
                    <div class="container ">
                        <a class="navbar-brand logo m-auto" href="{{ url('/') }}">{{ __('Fast Food') }}</a>   
                    </div>
                </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
