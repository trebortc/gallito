@php
$options = array("A","S","C");
$opciones[0]['opc']="A";$opciones[0]['nombre']="Activo";
$opciones[1]['opc']="S";$opciones[1]['nombre']="Suspendido";
$opciones[2]['opc']="F";$opciones[2]['nombre']="Finalizado";
@endphp
@extends('diseno.master')
@section('titulo','Torneo')
@section('contenido')
    <div class="container">
        <h2> TORNEO </h2>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $torneo->NOMBRE }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Descripción:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $torneo->DESCRIPCION }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Fecha:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre" value="{{ $torneo->FECHA }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Estado:</label>
            <div class="col-sm-10">
                <select name="estado" id="estado" class="form-control">
                    @foreach ($opciones as $opcion)
                        @if( $torneo->ESTADO == $opcion['opc'])
                            <option value="{{ $opcion['opc'] }}" selected="selected"> {{ $opcion['nombre'] }}</option>    
                        @else
                            <option value="{{ $opcion['opc'] }}"> {{ $opcion['nombre'] }}</option>    
                        @endif
                    @endforeach      
                </select>
            </div>
        </div>        
    </div>
    {{-- <a href="{{ url()->previous() }}"> Regresar</a> --}}

@endsection