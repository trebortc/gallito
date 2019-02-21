@extends('diseno.master')
@section('titulo','Pelea Gallos')
@section('contenido')
    @include('pelea_gallos.modal_editar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/pelea_gallos/nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
                    <a href="{{ url('/pelea_gallos/peleas') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Peleas</a>
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
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">GALLO 1</th>
                                <th scope="col">GALLO 2</th>
                                <th scope="col">GALLO<br>GANADOR</th>
                                <th scope="col">TIEMPO</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($peleaGallos)
                                @foreach ($peleaGallos as $peleaGallo)
                                    <tr>
                                        <th scope="row">{{ $loop -> iteration}}</th>
                                        <td>{{ $peleaGallo -> inscripcionTorneo1 -> PLACA_GALLO}}</td>
                                        <td>{{ $peleaGallo -> inscripcionTorneo2 -> PLACA_GALLO}}</td>
                                        <td>
                                            @if(!(empty($peleaGallo->RESULTADO)))
                                                {{ $peleaGallo->RESULTADO }}
                                            @else
                                                DEFINA VENCEDOR
                                            @endif
                                        </td>
                                        <td>
                                            @if(!(empty($peleaGallo->TIEMPO)))
                                                {{ $peleaGallo->TIEMPO }}
                                            @else
                                                SIN TIEMPO
                                            @endif 
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
                                        <td><a class="btn btn-primary btn-sm" href="{{ url('/pelea_gallos/ver/'.$peleaGallo->ID_PELEA) }}"> Ver </a>
                                        
                                            @switch($peleaGallo->ESTADO)
                                                @case('A')
                                                    <button type="button" id="criaderoBoton" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#peleaGallosEditarModal" data-id="{{ $peleaGallo->ID_PELEA }}" data-pelea="{{ $peleaGallo }}">
                                                        Ganador
                                                    </button>  
                                                    @break
                                                @case('F')
                                                    <button disabled type="button" id="criaderoBoton" class="btn btn-secondary btn-sm">
                                                        Ganador
                                                    </button>
                                                    @break            
                                            @endswitch
                                        
                                        <a class="btn btn-danger btn-sm" href="{{ url('/pelea_gallos/eliminar/'.$peleaGallo->ID_PELEA) }}"> Eliminar </a>
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
                $('#id').val(id);
                var gallo1 = new Option(""+peleaGallo['inscripcion_torneo1']['PLACA_GALLO'], ""+peleaGallo['inscripcion_torneo1']['PLACA_GALLO']);
                var gallo2 = new Option(""+peleaGallo['inscripcion_torneo2']['PLACA_GALLO'], ""+peleaGallo['inscripcion_torneo2']['PLACA_GALLO']);
                $("#ganador").append(gallo1);
                $("#ganador").append(gallo2);
            });
        });
    </script>
@endsection
