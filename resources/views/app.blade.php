<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Portal Ciudadano</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar justify-content-between fixed-top" style="background-color: #134F5C">
                @if(Request::is('/'))
                  <a class="navbar-brand" href="{{url('/')}}">
                    <!-- <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
                    Portal Ciudadano
                  </a>
                  <a href="{{url('/nuevo')}}" class="navbar-text pull-right newReport">
                      Nuevo Reporte
                  </a>
                @elseif(Route::current()->getName() == 'new')
                    <a class="navbar-brand" href="{{url('/')}}">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        Últimos reportes
                    </a>
                @endif
            </nav>
            <div class="container">
                @yield('content')
            </div>
        </div>
        <script src="{{asset('js/sweetalert2.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/toastr.js')}}"></script>
        <script src="{{asset('js/humanized_time_span.js')}}"></script>
    </body>
</html>
