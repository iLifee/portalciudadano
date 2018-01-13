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
              <a class="navbar-brand" href="{{url('/')}}">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                Últimos reportes
              </a>
            </nav>
            <Formulario></Formulario>
        </div>
        <script src="{{asset('js/sweetalert2.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/toastr.js')}}"></script>
        
    </body>
</html>
