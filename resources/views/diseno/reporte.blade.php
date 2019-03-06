<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('titulo')</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        
    </head>
    <body>
        <div style='text-align: right;  padding-right: 70px;'><div style='font-weight:bolder;'>Fecha:</div> <?php $hoy = date('m-d-Y'); echo "".$hoy; ?></div> 
        @yield('contenido') 
        @yield('scripts')
    </body>
</html>