@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Representante - Nuevo</h1> 
                <br>
                <form action=" {{ url('/representante/crear') }}" method="POST">
                    {!! csrf_field() !!}
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
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba su identificacion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba su nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefonos" class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Escriba su número telefónico">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Escriba su correo">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">descripción:</label>
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
@endsection

        
