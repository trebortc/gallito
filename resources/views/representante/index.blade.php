@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h3>Representante - Nuevo</h3> 
                <form action=" {{ url('/representante/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Criaderos:</label>
                        <div class="col-sm-10">
                            <select name="id_criaderos" id="criadero" class="form-control js-example-basic-single js-states">
                                @foreach ($criaderos as $criadero)
                                    <option value="{{ $criadero -> ID_CRIADEROS }}">{{ $criadero -> NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Escriba su identificacion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba su nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefonos" class="col-sm-2 col-form-label">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Escriba su número telefónico">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Escriba su correo">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">descripción:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                <option value="A">Activo</option>
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
        <!-- Boton nuevo oculto
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/representante/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        -->
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

            $('#criadero').select2({
                width: 'resolve' 
            });
        });
        
    </script>
@endsection
