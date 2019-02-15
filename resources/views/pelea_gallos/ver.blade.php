@php
    $opciones[0]['opc']="A";$opciones[0]['nombre']="Activo";
    $opciones[1]['opc']="F";$opciones[1]['nombre']="Finalizado";
    $opciones[2]['opc']="C";$opciones[2]['nombre']="Clausurado";
@endphp
@extends('diseno.master')
@section('titulo','Pelea Gallo')
@section('contenido')
    <div class="container p-5"><br>
        <h4 class="font-weight-bold">PELEA GALLO</h4>
        <hr>
        <div class="form-group row">
            <label for="gallo1" class="col-sm-2 col-form-label text-right">Gallo 1:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="gallo1" name="gallo1" placeholder="Escriba el nombre" value="{{ $peleaGallo->inscripcionTorneo1->PLACA_GALLO }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="gallo2" class="col-sm-2 col-form-label text-right">Gallo 2:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="gallo2" name="gallo2" placeholder="Escriba el nombre" value="{{ $peleaGallo->inscripcionTorneo2->PLACA_GALLO }}">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for="ganador" class="col-sm-2 col-form-label text-right">Ganador:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ganador" name="ganador" placeholder="Escriba el nombre" value="{{ $peleaGallo->RESULTADO }}">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for="tiempo" class="col-sm-2 col-form-label text-right">Tiempo:</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" id="tiempo" name="tiempo" value="{{ $peleaGallo->TIEMPO }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="observacion" class="col-sm-2 col-form-label text-right">Observación:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="observacion" name="observacion" rows="3">{{ $peleaGallo->OBSERVACION }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label text-right">Estado:</label>
            <div class="col-sm-10">
                <select name="estado" id="estado" class="form-control">
                    @foreach ($opciones as $opcion)
                        @if( $peleaGallo->ESTADO == $opcion['opc'])
                            <option value="{{ $opcion['opc'] }}" selected="selected"> {{ $opcion['nombre'] }}</option>    
                        @else
                            <option value="{{ $opcion['opc'] }}"> {{ $opcion['nombre'] }}</option>    
                        @endif
                    @endforeach      
                </select>
            </div>
        </div>        
    </div>
    <a href="{{ url()->previous() }}">Regresar</a>
@endsection