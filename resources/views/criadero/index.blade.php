@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/criadero/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ url('/criadero/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar criadero"> <span class="input-group-btn">
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
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($criaderos)
                                @foreach ($criaderos as $criadero)
                                <tr>
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $criadero -> NOMBRE }}</td>
                                    <td>{{ $criadero -> DESCRIPCION }}</td>
                                    <td>
                                        @switch($criadero->ESTADO)
                                            @case('A')
                                                Activo
                                                @break
                                            @case('C')
                                                Clausurado
                                                @break    
                                            @case('S')
                                                Suspendido
                                                @break                                                
                                        @endswitch
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('/criadero/ver/'.$criadero->ID_CRIADEROS) }}"> <i class="fa fa-file-text-o"></i> </a>
                                        <a class="btn btn-secondary btn-sm" href="{{ url('/criadero/editar/'.$criadero->ID_CRIADEROS)}}"> <i class="fa fa-pencil-square-o"></i> </a>                                  
                                        <!-- Botón trigger modal -->
                                        <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $criadero->ID_CRIADEROS }}">
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
                @isset($criaderos)
                    {{ $criaderos -> links() }}    
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
                    var url = "/criadero/eliminar/"+id;
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
