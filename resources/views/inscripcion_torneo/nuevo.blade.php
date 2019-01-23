@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Inscripcion Torneo - Nuevo</h1>
                <br>
                <form action=" {{ url('/inscripcion_torneo/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Torneo:</label>
                        <div class="col-sm-8">
                            <select name="id_torneo" id="torneo_id" class="form-control">
                                <option value="-1">Seleccione una opción</option>
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
                            <input type="number" class="form-control" id="peso_gallo" name="peso_gallo" placeholder="Escriba el peso del gallo">
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
                                <option value="S">Suspendido</option>
                                <option value="C">Clausurado</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Grabar</button>
                </form>
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
        });
    </script>
@endsection
