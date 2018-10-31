<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>@yield('titulo')</title>
        <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Gallos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ '/criadero' }}">Criadero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/torneo' }}">Torneo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/representante' }}">Representante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/gallo' }}">Gallo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/inscripcion_torneo' }}">Inscripcion Torneo</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('contenido')
        <script src="js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8" ></script>
        
        <script src="js/popper.min.js" type="text/javascript" charset="utf-8" ></script>
        <script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" ></script>
    </body>
</html>