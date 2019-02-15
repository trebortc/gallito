@extends('diseno.master')
@section('titulo','Parametro')
@section('contenido')
    <div class="container">
        <h2> PARAMETRO </h2>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $parametro->NOMBRE_PARAMETRO }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Valor:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $parametro->VALOR }}">
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}"> Regresar</a>

@endsection