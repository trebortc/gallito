@extends('diseno.master')
@section('titulo','Pelea Gallos')
@section('contenido')
    @include('pelea_gallos.modal_editar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/pelea_gallos/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i>Crear Pelea</a>
                    <a href="{{ url('/pelea_gallos/peleas') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-flickr"></i>Generar Peleas</a>
                    <a href="{{ url('/pelea_gallos/reporte') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-text-o"></i>Reporte Peleas</a>
                    <a href="{{ url('/pelea_gallos/limpiar') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fas fa-eraser"></i>Limpiar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Mensaje: </strong> {{ $mensaje }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <form action="{{ url('/pelea_gallos/buscar') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="input-group p-4">
                            <input type="text" class="form-control" name="textoBuscar"
                                placeholder="Buscar pelea gallo"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <img src="{{ asset('img/search-icon.png') }}" alt="Icono buscar" class="img-fluid" width="20">
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table" id="miTabla">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">GALLO 1</th>
                                <th scope="col">GALLO 2</th>
                                <th scope="col">GALLO<br>GANADOR</th>
                                <th scope="col">PESOS</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($peleaGallos)
                                @foreach ($peleaGallos as $peleaGallo)
                                    <tr class="clickTabla-fila">
                                        <th scope="row">{{ $loop -> iteration}}</th>
                                        <td>{{ $peleaGallo -> inscripcionTorneo1 -> PLACA_GALLO}}
                                            <div style='font-size:0.7rem'>[{{ $peleaGallo -> inscripcionTorneo1 -> NOMBRE_CRIADERO}}]</div>
                                        </td>
                                        <td>{{ $peleaGallo -> inscripcionTorneo2 -> PLACA_GALLO}}
                                            <div style='font-size:0.7rem'>[{{ $peleaGallo -> inscripcionTorneo2 -> NOMBRE_CRIADERO}}]</div>
                                        </td>
                                        <td>
                                            @if(!(empty($peleaGallo->RESULTADO)))
                                                {{ $peleaGallo->RESULTADO }}
                                            @else
                                                DEFINA VENCEDOR
                                            @endif
                                        </td>
                                        <td>
                                            {{ $peleaGallo->inscripcionTorneo1->PESO_GALLO }}/
                                            {{ $peleaGallo->inscripcionTorneo2->PESO_GALLO }}
                                        </td>
                                        <td>
                                            @switch($peleaGallo->ESTADO)
                                                @case('A')
                                                    ACTIVO    
                                                @break
                                                @case('D')
                                                    DESAFIO
                                                @break
                                                @case('F')
                                                    FINALIZADO
                                                @break
                                                @case('S')
                                                    SUSPENDIDO
                                                @break
                                            @endswitch
                                        </td>
                                        <td><a class="btn btn-primary btn-sm" href="{{ url('/pelea_gallos/ver/'.$peleaGallo->ID_PELEA) }}"> <i class="fa fa-file-text-o"></i> </a>
                                        
                                            @switch($peleaGallo->ESTADO)
                                                @case('A') @case('D')
                                                    <button type="button" id="criaderoBoton" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#peleaGallosEditarModal" data-id="{{ $peleaGallo->ID_PELEA }}" data-pelea="{{ $peleaGallo }}">
                                                        <i class="fa fa-hand-rock-o" aria-hidden="true"></i>
                                                    </button>  
                                                    @break
                                                @case('F')
                                                    <button disabled type="button" id="criaderoBoton" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-trophy" aria-hidden="true"></i>
                                                    </button>
                                                    @break            
                                            @endswitch
                                        
                                        <a class="btn btn-danger btn-sm" href="{{ url('/pelea_gallos/eliminar/'.$peleaGallo->ID_PELEA) }}"> <i class="fa fa-window-close"></i> </a>
                                        <!-- Botón trigger modal -->
                                        </td>
                                    </tr>
                                @endforeach   
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @isset($peleaGallos)
                    {{ $peleaGallos -> links() }}    
                @endisset
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#peleaGallosEditarModal').on('show.bs.modal', function (e) {
                var boton = $(e.relatedTarget)
                var id = boton.data('id');
                var peleaGallo = boton.data('pelea');
                //$("#ganador").find("option[value=".peleaGallo['inscripcion_torneo1']['PLACA_GALLO']."]").remove(); 
                //$("#ganador").find("option[value=".peleaGallo['inscripcion_torneo2']['PLACA_GALLO']."]").remove();
                $('#id').val(id);
                var gallo1 = new Option(""+peleaGallo['inscripcion_torneo1']['PLACA_GALLO'], ""+peleaGallo['inscripcion_torneo1']['PLACA_GALLO']);
                var gallo2 = new Option(""+peleaGallo['inscripcion_torneo2']['PLACA_GALLO'], ""+peleaGallo['inscripcion_torneo2']['PLACA_GALLO']);
                var definirGallo = new Option("Seleccione ganador","-1");
                $('#ganador').empty();
                $('#ganador').append(definirGallo);
                $("#ganador").append(gallo1);
                $("#ganador").append(gallo2);
            });
        });
    </script>
@endsection
