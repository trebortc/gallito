@extends('diseno.master')
@section('titulo','Inscripcion Torneo')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Inscripcion Torneo - Nuevo</h3>
                <form action=" {{ url('/inscripcion_torneo/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Torneo:</label>
                        <div class="col-sm-8">
                            <select name="id_torneo" id="torneo_id" class="form-control">
                                @foreach ($torneos as $torneo)
                                    <option value="{{ $torneo -> ID_TORNEO }}">{{ $torneo -> NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Gallo:</label>
                        <div class="col-sm-8">
                            <select name="id_gallo" id="gallo_id" class="form-control">
                                <option value="-1">Seleccione una opción</option>
                                @foreach ($gallos as $gallo)
                                    <option value="{{ $gallo -> ID_GALLO }}">{{ $gallo -> PLACA }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre_criadero" class="col-sm-2 col-form-label">Criadero:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre_criadero" name="nombre_criadero" placeholder="Escriba el nombre del criadero">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="id_criaderos" id="id_criadero" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre_representante" class="col-sm-2 col-form-label">Representante:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre_representante" name="nombre_representante" placeholder="Escriba el nombre representante">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="id_representante" id="id_representante" style="visibility:hidden">        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="placa_gallo" class="col-sm-2 col-form-label">Placa gallo:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="placa_gallo" name="placa_gallo" placeholder="Escriba placa del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="peso_gallo" class="col-sm-2 col-form-label">Peso gallo:</label>
                        <div class="col-sm-5">
                        <input type="number" class="form-control" id="peso_gallo" name="peso_gallo" placeholder="Escriba el peso del gallo" step="0.01" min="{{ $pesoMinimo}}" max="{{ $pesoMaximo}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edad_gallo" class="col-sm-2 col-form-label">Edad del gallo:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="edad_gallo" name="edad_gallo" placeholder="Escriba edad del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="talla_gallo" class="col-sm-2 col-form-label">Talla del gallo:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="talla_gallo" name="talla_gallo" placeholder="Escriba talla del gallo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-5">
                            <select name="estado" id="estado" class="form-control">
                                <option value="A">Activo</option>
                                <option value="C">Clausurado</option>
                                <option value="F">Finalizado</option>
                                <option value="S">Suspendido</option>
                                <option value="O">Sorteado</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Grabar</button><br>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Oculto boton nuevo
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ route('inscripcion_torneo_nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        -->
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

            $('#gallo_id').on('change', function(e){
                var gallo_id = e.target.value;
                $.ajax({
                    type: "POST",
                    dataType:'json',
                    url : "/inscripcion_torneo/cargarInformacionGallo/"+gallo_id,
                    success : function(datos) {
                        $("#resultados").html(""+ datos);
                        $("#nombre_criadero").attr("value", datos.nombreCriadero);
                        $("#id_criadero").attr("value",datos.idCriadero);
                        $("#nombre_representante").attr("value", datos.nombreRepresentante);
                        $("#id_representante").attr("value",datos.idRepresentante);
                        $("#placa_gallo").attr("value", datos.placaGallo);
                        $("#peso_gallo").attr("value", datos.pesoGallo);
                        $("#edad_gallo").attr("value", datos.edadGallo);
                        $("#talla_gallo").attr("value", datos.tallaGallo);
                    }
                });
            });

            $("#criaderoBoton").click(function() {
                var numero_gallo = $('#gallo option:selected').val();
                //$('#producto option:selected').val();
                $.ajax({
                    type: "POST",
                    dataType:'json',
                    url : "/mensajeJson/"+numero_gallo,
                    success : function(data) {
                        var datos = data;
                        var nombreCriadero = datos.nombreCriadero;
                        console.log(datos);
                        $("#ejm").html("INFO 1:" + nombreCriadero + "INFO 2:" + nombreCriadero);
                        $("#resultados").html("INFO 1:" + datos.nombreCriadero + "INFO 2:" + data.nombreRepresentante);
                        //$("#resultados").html(""+ datos); 
                    }
                });
            });

            $('#torneo_id').select2({
                width: 'resolve' 
            });

            $('#gallo_id').select2({
                width: 'resolve' 
            });

        });
    </script>
@endsection
