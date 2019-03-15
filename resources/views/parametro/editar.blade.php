@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Parametro - Editar</h1>
                <br>
                <form action=" {{ url('/parametro/actualizar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Escriba el nombre" value="{{ $parametro->NOMBRE_PARAMETRO }}" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="valor" class="col-sm-2 col-form-label">Valor:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba el valor" value="{{ $parametro->VALOR }}">
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
