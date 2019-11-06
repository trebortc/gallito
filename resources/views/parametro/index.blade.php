@extends('diseno.master')
@section('titulo','Parametros')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/parametro/nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">NOMBRE</th>
                                <th scope="col">VALOR</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parametros as $parametro)
                                <tr>
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $parametro -> NOMBRE_PARAMETRO }}</td>
                                    <td>{{ $parametro -> VALOR }}</td>
                                    <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ url('/parametro/ver/'.$parametro->NOMBRE_PARAMETRO) }}">Ver</a>
                                    <a class="btn btn-secondary btn-sm" href="{{ url('/parametro/editar/'.$parametro->NOMBRE_PARAMETRO) }}">Editar</a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/parametro/eliminar/'.$parametro->NOMBRE_PARAMETRO) }}">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <br><center>
                    <div class="alert alert-danger" role="alert">
                        Eliminar Información
                    </div>
                </center><br>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/torneo/eliminarTodos">
                        Torneo&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/criadero/eliminarTodos">
                        Criadero&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/representante/eliminarTodos">
                        Representante&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/gallo/eliminarTodos">
                        Gallo&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/inscripcion_torneo/eliminarTodos">
                        Inscripcion Torneo&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                    <!-- Botón trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-url="/pelea_gallos/eliminarTodos">
                        Pelea gallo&nbsp;&nbsp;<i class="fa fa-window-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type = "text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#eliminarModal').on('show.bs.modal', function (e) {
                var boton = $(e.relatedTarget)
                $("#eliminar").click(function()
                {
                    var url = boton.data('url');
                    $.ajax({
                        url : url,
                        success : function(data) {
                            alert( "Se eliminaron todos los datos" );
                            location.reload();
                        },
                        error : function(data) {
                            alert("Existe una relación con el elemento a eliminar");
                            location.reload();
                        }
                    }); 
                });
            });
        });
    </script>
@endsection
