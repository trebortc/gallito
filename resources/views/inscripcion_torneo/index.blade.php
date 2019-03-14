@extends('diseno.master')
@section('titulo','Inscripcion Torneo')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ route('inscripcion_torneo_nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                    @isset($mensaje)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Mensaje: </strong> {{ $mensaje }} 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endisset 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ url('/inscripcion_torneo/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar inscripcion torneo"> <span class="input-group-btn">
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
                                <th scope="col">CRIADERO</th>
                                <th scope="col">REPRESENTANTE</th>
                                <th scope="col">PLACA GALLO</th>
                                <th scope="col">PESO GALLO</th>                                                
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($inscripciones)
                                @foreach ($inscripciones as $inscripcion)
                                    <tr class="clickTabla-fila">
                                        <th scope="row">{{ $loop -> iteration }}</th>
                                        <td>{{ $inscripcion -> criadero -> NOMBRE }}</td>
                                        <td>{{ $inscripcion -> NOMBRE_REPRESENTANTE }}</td>
                                        <td>{{ $inscripcion -> PLACA_GALLO }}</td>
                                        <td>{{ $inscripcion -> PESO_GALLO }}</td>
                                        <td>
                                            @switch($inscripcion->ESTADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('C')
                                                    Clausurado
                                                @case('F')
                                                    Finalizado
                                                    @break    
                                                @case('S')
                                                    Suspendido
                                                    @break
                                                @case('O')
                                                    Sorteado
                                                @break                                                
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/inscripcion_torneo/ver/'.$inscripcion->ID_DESCRIPCION) }}"> <i class="fa fa-file-text-o"></i> </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/inscripcion_torneo/editar/'.$inscripcion->ID_DESCRIPCION) }}"> <i class="fa fa-pencil-square-o"></i> </a>
                                            <!-- Botón trigger modal -->
                                            <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $inscripcion->ID_DESCRIPCION }}">
                                                <i class="fa fa-window-close"></i>
                                            </button>
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
                @isset($inscripciones)
                    {{ $inscripciones -> links() }}      
                @endisset
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
                var id = boton.data('id');
                console.log("Dato a boorar" + id);
                $("#eliminar").click(function()
                {
                    var url = "/inscripcion_torneo/eliminar/"+id;
                    $.ajax({
                        url : url,
                        success : function(data) {
                            alert( "Se elimino el dato correctamente" );
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
