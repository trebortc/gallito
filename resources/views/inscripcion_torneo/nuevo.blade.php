@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Inscripcion Torneo - Nuevo</h1>
                <br>
                <form action=" {{ url('/inscripcion_torneo/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Torneos:</label>
                        <div class="col-sm-10">
                            <select name="id_torneo" id="torneo" class="form-control">
                                @foreach ($torneos as $torneo)
                                    <option value="{{ $torneo -> ID_TORNEO }}">{{ $torneo -> NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Criaderos:</label>
                        <div class="col-sm-10">
                            <select name="id_criaderos" id="criadero" class="form-control">
                                @foreach ($criaderos as $criadero)
                                    <option value="{{ $criadero -> ID_CRIADEROS }}">{{ $criadero -> NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Representantes:</label>
                        <div class="col-sm-10">
                            <select name="id_representante" id="representante" class="form-control">
                                @foreach ($representantes as $representante)
                                    <option value="{{ $representante -> ID_REPRESENTANTE }}">{{ $representante -> NOMBRES }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Gallos:</label>
                        <div class="col-sm-10">
                            <select name="id_gallo" id="gallo" class="form-control">
                                @foreach ($gallos as $gallo)
                                    <option value="{{ $gallo -> ID_GALLO }}">{{ $gallo -> PLACA }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre_criadero" class="col-sm-2 col-form-label">Nombre criadero:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_criadero" name="nombre_criadero" placeholder="Escriba el nombre del criadero">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre_representante" class="col-sm-2 col-form-label">Nombre representante:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" placeholder="Escriba el nombre representante">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="placa_gallo" class="col-sm-2 col-form-label">Placa gallo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="placa_gallo" name="placa_gallo" placeholder="Escriba placa del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="peso_gallo" class="col-sm-2 col-form-label">Peso gallo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="peso_gallo" name="peso_gallo" placeholder="Escriba el peso del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edad_gallo" class="col-sm-2 col-form-label">Edad del gallo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edad_gallo" name="edad_gallo" placeholder="Escriba edad del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="talla_gallo" class="col-sm-2 col-form-label">Talla del gallo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="talla_gallo" name="talla_gallo" placeholder="Escriba talla del gallo">
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
@endsection
