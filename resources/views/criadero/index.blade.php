@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/criadero/nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criaderos as $criadero)
                                <tr>
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $criadero -> NOMBRE }}</td>
                                    <td>{{ $criadero -> DESCRIPCION }}</td>
                                    <td>{{ $criadero -> ESTADO }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('/criadero/ver/'.$criadero->ID_CRIADEROS) }}"> Ver </a>
                                        <a class="btn btn-secondary btn-sm" href="{{ url('/criadero/editar/'.$criadero->ID_CRIADEROS)}}"> Editar </a>                                  
                                        <!-- Botón trigger modal -->
                                        <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $criadero->ID_CRIADEROS }}">
                                            Eliminar
                                        </button>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $criaderos -> links() }}    
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

            //$('#eliminarModal').on('show.bs.modal', function (e) {
            //    var boton = $(e.relatedTarget)
            //    var id = boton.data('id');
            //    $("#eliminar").click(function()
            //    {
            //        var url = "/criadero/eliminar/"+id;
            //        $.get(url, function( data ) {
            //            alert( "Se elimino el dato correctamente" );
            //            location.reload();
            //        });
            //        
            //    });
            //});

            
            $('#eliminarModal').on('show.bs.modal', function (e) {
                var boton = $(e.relatedTarget)
                var id = boton.data('id');
                $("#eliminar").click(function()
                {
                    var url = "/criadero/eliminar/"+id;
                    $.ajax({
                        url : url,
                        success : function(data) {
                            //alert( "Se elimino el dato correctamente" );
                            //location.reload();
                        },
                        error : function(data) {
                            alert("Existe una relación con el elemento a eliminar");
                            //location.reload();
                        }
                    }); 
                });
            });

        });
    </script>
@endsection
