<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('titulo')</title>
        <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/icono.png') }}" />
        @yield('estilos')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="row mx-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/gallo.jpeg') }}" width="40">Gallos de Combate</a>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('torneo') }}">Torneo <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('criadero') }}">Criadero</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('representante') }}">Representante</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gallo') }}">Gallo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('inscripcion_torneo') }}">Inscripcion Torneo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pelea_gallos') }}">Pelea Gallo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('contenido') 

        <script src="{{ asset('js/jquery-3.2.1.js') }}"  type="text/javascript" charset="utf-8" ></script>
        <script src="{{ asset('js/popper.min.js') }}" type="text/javascript" charset="utf-8" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8" ></script>

        @yield('scripts')

    </body>
</html>