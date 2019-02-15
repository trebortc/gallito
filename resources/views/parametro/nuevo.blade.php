@extends('diseno.master')
@section('titulo','Parametro')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Parametro - Nuevo</h1>
                <br>
                <form action=" {{ url('/parametro/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="valor" class="col-sm-2 col-form-label">Valor:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Escriba un valor">
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
