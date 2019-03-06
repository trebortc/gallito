@php
    $options = array("A","S","C");
    $opciones[0]['opc']="A";$opciones[0]['nombre']="Activo";
    $opciones[1]['opc']="S";$opciones[1]['nombre']="Suspendido";
@endphp
@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Representante - Editar</h1> 
                <form action=" {{ url('/representante/actualizar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Codigo representante" value="{{ $representante->ID_REPRESENTANTE }}" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Criaderos:</label>
                        <div class="col-sm-10">
                            <select name="id_criaderos" id="criadero" class="form-control">
                                @foreach ($criaderos as $criadero)
                                    @if($representante->criadero->ID_CRIADEROS == $criadero->ID_CRIADEROS)
                                        <option value="{{ $criadero -> ID_CRIADEROS }}" selected="selected">{{ $criadero -> NOMBRE }}</option>
                                    @else
                                        <option value="{{ $criadero -> ID_CRIADEROS }}">{{ $criadero -> NOMBRE }}</option>
                                    @endif  
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba su identificacion" value="{{ $representante->IDENTIFICACION }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba su nombre" value="{{ $representante->NOMBRES }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefonos" class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Escriba su número telefónico" value="{{ $representante->TELEFONOS }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Escriba su correo" value="{{ $representante->CORREO }}">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">descripción:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción" value="{{  $representante->DESCRIPCION }}">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                @foreach ($opciones as $opcion)
                                    @if( $representante->ETADO == $opcion['opc'])
                                        <option value="{{ $opcion['opc'] }}" selected="selected"> {{ $opcion['nombre'] }}</option>    
                                    @else
                                        <option value="{{ $opcion['opc'] }}"> {{ $opcion['nombre'] }}</option>    
                                    @endif
                                @endforeach      
                            </select>
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

        
