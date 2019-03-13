@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/representante/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ url('/representante/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar representante"> <span class="input-group-btn">
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
                                <th scope="col">IDENTIFICACION</th>
                                <th scope="col">NOMBRES</th>
                                <th scope="col">TELEFONOS</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($representantes)
                                @foreach ($representantes as $representante)
                                    <tr class="clickTabla-fila">
                                        <th scope="row">{{ $loop -> iteration }}</th>
                                        <td>{{ $representante -> criadero -> NOMBRE }}</td>
                                        <td>{{ $representante -> IDENTIFICACION }}</td>
                                        <td>{{ $representante -> NOMBRES }}</td>
                                        <td>{{ $representante -> TELEFONOS }}</td>
                                        <td>
                                            @switch($representante->ETADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('S')
                                                    Suspendido
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/representante/ver/'.$representante->ID_REPRESENTANTE) }}"> <i class="fa fa-file-text-o"></i> </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/representante/editar/'.$representante->ID_REPRESENTANTE)}}"> <i class="fa fa-pencil-square-o"></i> </a>
                                            <!-- Botón trigger modal -->
                                            <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $representante->ID_REPRESENTANTE }}">
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
                @isset($representantes)
                    {{ $representantes->links() }}
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
                    var url = "/representante/eliminar/"+id;
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
