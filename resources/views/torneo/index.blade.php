@extends('diseno.master')
@section('titulo','Torneos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <br>
                <h3>Torneo - Nuevo</h3>
                <form action=" {{ url('/torneo/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                <option value="A">Activo</option>
                                <option value="F">Finalizado</option>
                                <option value="S">Suspendido</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Oculto boton nuevo
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/torneo/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        -->
        <div class="row">
            <div class="col">
                <form action="{{ url('/torneo/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar torneo"> <span class="input-group-btn">
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
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($torneos)
                                @foreach ($torneos as $torneo)
                                    <tr class="clickTabla-fila">
                                        <th scope="row">{{ $loop -> iteration}}</th>
                                        <td>{{ $torneo -> NOMBRE }}</td>
                                        <td>{{ str_limit($torneo->DESCRIPCION, $limit = 150, $end = '...') }}
                                        <td>
                                            @switch($torneo -> ESTADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('F')
                                                    Finalizado
                                                    @break
                                                @case('S')
                                                    Suspendido
                                                    @break    
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/torneo/ver/'.$torneo->ID_TORNEO) }}"><i class="fa fa-file-text-o"></i></a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/torneo/editar/'.$torneo->ID_TORNEO) }}"><i class="fa fa-pencil-square-o"></i></a>
                                            <!-- Botón trigger modal -->
                                            <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $torneo->ID_TORNEO }}">
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
                @isset($torneos)
                    {{ $torneos -> links() }}
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
                $("#eliminar").click(function()
                {
                    var url = "/torneo/eliminar/"+id;
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