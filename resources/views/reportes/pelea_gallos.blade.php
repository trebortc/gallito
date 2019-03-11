@extends('diseno.reporte')
@section('titulo','Reporte pelea gallos')
<h2 style='padding-left: 30px;'>REPORTE PELEA GALLOS</h2>
<style>
   body {font-family: Arial, Helvetica, sans-serif;}

    table {     
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 12px;    
        margin: 30px;     
        text-align: left;    
        border-collapse: collapse; }

    th {     
        font-size: 13px;     
        font-weight: normal;     
        padding: 8px;     
        background: rgb(195,196,196);
        border-top: 1px solid white;    
        border-bottom: 1px solid white; 
        color: black; 
    }

    td {    
        padding: 8px;     
        background: rgb(242, 242, 242);     
        border-bottom: 1px solid #fff;
        color: black;    
        border-top: 1px solid transparent; 
    }
</style>
@section('contenido')
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CRIADERO</th>
                        <th scope="col">REPRESENTANTE</th>
                        <th scope="col">GALLO</th>
                        <th scope="col">PESOS</th>
                        <th scope="col">GANADOR</th>
                        <th scope="col">TIEMPO</th>
                        <th scope="col">ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($peleaGallos)
                        @foreach ($peleaGallos as $peleaGallo)
                            <tr>
                                <th scope="row">{{ $loop -> iteration}}</th>
                                <td>
                                    {{ $peleaGallo ->inscripcionTorneo1->NOMBRE_CRIADERO }}<br>
                                    {{ $peleaGallo ->inscripcionTorneo2->NOMBRE_CRIADERO }}
                                </td>
                                <td>
                                    {{ $peleaGallo ->inscripcionTorneo1->NOMBRE_REPRESENTANTE }}<br>
                                    {{ $peleaGallo ->inscripcionTorneo2->NOMBRE_REPRESENTANTE }}
                                </td>
                                <td>
                                    {{ $peleaGallo ->inscripcionTorneo1->PLACA_GALLO }}<br>
                                    {{ $peleaGallo ->inscripcionTorneo2->PLACA_GALLO }}
                                </td>
                                <td>
                                    {{ $peleaGallo->inscripcionTorneo1->PESO_GALLO }}<br>
                                    {{ $peleaGallo->inscripcionTorneo2->PESO_GALLO }}
                                    </td>
                                <td>
                                    @if(!(empty($peleaGallo->RESULTADO)))
                                        {{ $peleaGallo->RESULTADO }}
                                    @else
                                        _____________
                                    @endif
                                </td>
                                <td>
                                    {{ $peleaGallo->TIEMPO}}
                                </td>
                                <td>
                                    @switch($peleaGallo->ESTADO)
                                        @case('A')
                                            ACTIVO    
                                        @break
                                        @case('F')
                                            FINALIZADO
                                        @break
                                        @case('S')
                                            SUSPENDIDO
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach   
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
