<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Nuevo - Gallo</title>
            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
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
                        <a class="nav-link" href="{{ '/criadero' }} ">Criadero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/torneo' }} ">Torneo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/representante' }} ">Representante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ '/gallo' }}">Gallo</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <br>
                        <h1>Gallo - Nuevo</h1>
                        <br>
                        <form action=" {{ url('/gallo/crear') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Representante:</label>
                                <div class="col-sm-10">
                                    <select name="id_representante" id="representante" class="form-control">
                                        @foreach ($representantes as $representante)
                                            <option value="{{ $representante -> ID_REPRESENTANTE }}">{{ $representante -> NOMBRES }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="placa" class="col-sm-2 col-form-label">Placa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese número de placa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="peso" name="peso" placeholder="Ingrese el peso" step="0.001">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" step="0.001">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="talla" class="col-sm-2 col-form-label">Talla:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="talla" name="talla" placeholder="Ingrese su talla" step="0.001">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                                <div class="col-sm-10">
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="A">Activo</option>
                                        <option value="S">Suspendido</option>
                                        <option value="C">Clausurado</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit">Grabar</button>
                        </form>
                    </div>
                </div>
            </div>
        <script src="../js/jquery-3.2.1.slim.min.js" type="text/javascript" charset="utf-8" ></script>
        <script src="../js/popper.min.js" type="text/javascript" charset="utf-8" ></script>
        <script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" ></script>
    </body>
</html>

