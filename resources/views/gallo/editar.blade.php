@php
    $options = array("A","S","C");
    $opciones[0]['opc']="A";$opciones[0]['nombre']="Activo";
    $opciones[1]['opc']="S";$opciones[1]['nombre']="Suspendido";
    $opciones[2]['opc']="C";$opciones[2]['nombre']="Clausurado";
@endphp
@extends('diseno.master')
@section('titulo','Gallo-Editar')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br><h1>Gallo - Editar</h1><br>
                <form action=" {{ url('/gallo/actualizar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" placeholder="Codigo gallo" value="{{ $gallo->ID_GALLO }}" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Representante:</label>
                        <div class="col-sm-10">
                            <select name="id_representante" id="representante" class="form-control">
                                @foreach ($representantes as $representante)
                                    @if ( $representante->ID_REPRESENTANTE == $gallo->representante->ID_REPRESENTANTE)
                                        <option value="{{ $representante -> ID_REPRESENTANTE }}" selected="selected">{{ $representante -> NOMBRES }}</option>
                                    @else
                                        <option value="{{ $representante -> ID_REPRESENTANTE }}">{{ $representante -> NOMBRES }}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="placa" class="col-sm-2 col-form-label">Placa:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese número de placa" value="{{ $gallo->PLACA }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="peso" name="peso" placeholder="Ingrese el peso" step="0.001" value="{{ $gallo->PESO }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" step="0.001" value="{{ $gallo->EDAD }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="talla" class="col-sm-2 col-form-label">Talla:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="talla" name="talla" placeholder="Ingrese su talla" step="0.001" value="{{ $gallo->TALLA }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                @foreach ($opciones as $opcion)
                                    @if( $gallo->ESTADO == $opcion['opc'])
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


