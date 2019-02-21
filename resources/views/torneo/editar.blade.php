@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Torneo - Editar</h1>
                <br>
                <form action=" {{ url('/torneo/actualizar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Escriba el nombre" value="{{ $torneo->ID_TORNEO }}" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $torneo->NOMBRE }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción" value="{{ $torneo->DESCRIPCION }}">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $torneo->FECHA }}">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                <option value="A">Activo</option>
                                <option value="F">Finalizado</option>
                                <option value="S">Suspendido</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
