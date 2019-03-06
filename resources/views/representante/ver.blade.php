@php
    $options = array("A","S","C");
    $opciones[0]['opc']="A";$opciones[0]['nombre']="Activo";
    $opciones[1]['opc']="S";$opciones[1]['nombre']="Suspendido";
    $opciones[2]['opc']="C";$opciones[2]['nombre']="Clausurado";
@endphp
@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <h2> REPRESENTANTE </h2>
        <div class="form-group row">
            <label for="identificacion" class="col-sm-2 col-form-label">Criadero:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="criadero" name="criadero" placeholder="Escriba su criadero" value="{{ $representante->criadero->NOMBRE }}">
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
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción" value="{{ $representante->DESCRIPCION }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Estado:</label>
            <div class="col-sm-10">
                <select name="estado" id="estado" class="form-control">
                    @foreach ($opciones as $opcion)
                        @if( $representante->ESTADO == $opcion['opc'])
                            <option value="{{ $opcion['opc'] }}" selected="selected"> {{ $opcion['nombre'] }}</option>    
                        @else
                            <option value="{{ $opcion['opc'] }}"> {{ $opcion['nombre'] }}</option>    
                        @endif
                    @endforeach      
                </select>
            </div>
        </div>
        {{-- <a href="{{ url()->previous() }}">Regresar</a> --}}
    </div>
@endsection