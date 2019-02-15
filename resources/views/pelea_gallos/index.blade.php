@extends('diseno.master')
@section('titulo','Pelea Gallos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/pelea_gallos/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
                </div>
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
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peleaGallos as $peleaGallo)
                                <tr>
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $peleaGallo -> inscripcionTorneo1 -> PLACA_GALLO}}</td>
                                    <td>{{ $peleaGallo -> inscripcionTorneo2 -> PLACA_GALLO}}</td>
                                    <td>
                                        @if(!(empty($peleaGallo->RESULTADO)))
                                            {{ $peleaGallo -> RESULTADO }}
                                        @else
                                            DEFINA VENCEDOR
                                        @endif
                                    </td>
                                    <td>
                                        @if(!(empty($peleaGallo->TIEMPO)))
                                            {{ $peleaGallo -> TIEMPO }}
                                        @else
                                            SIN TIEMPO
                                        @endif 
                                    </td>
                                    <td>
                                        @switch($peleaGallo -> ESTADO)
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
                                    <td><a href="{{ url('/pelea_gallos/ver/'.$peleaGallo->ID_PELEA) }}"> Ver </a></td>
                                    <td><a href="{{ url('/pelea_gallos/editar/'.$peleaGallo->ID_PELEA) }}"> Editar </a></td>
                                    <td><a href="{{ url('/pelea_gallos/eliminar/'.$peleaGallo->ID_PELEA) }}"> Eliminar </a></td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
        });
    </script>
@endsection
