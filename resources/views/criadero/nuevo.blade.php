<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Nuevo</title>
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
                        <h1>Criadero - Nuevo</h1>
                        <br>
                        <form action=" {{ url('/criadero/crear') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción">
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

