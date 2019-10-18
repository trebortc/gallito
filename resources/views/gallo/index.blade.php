@extends('diseno.master')
@section('titulo','Gallo')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
            <div class="row">
                <div class="col">
                    <br><h3>Gallo - Nuevo</h3>
                    <form action=" {{ url('/gallo/crear') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Representante:</label>
                            <div class="col-sm-10">
                                <select name="id_representante" id="representante" class="form-control">
                                    @foreach ($representantes as $representante)
                                        <option value="{{ $representante -> ID_REPRESENTANTE }}">{{ $representante -> NOMBRES }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="placa" class="col-sm-2 col-form-label">Placa:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese número de placa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="peso" name="peso" placeholder="Ingrese el peso" step="0.01" min="{{ $pesoMinimo}}" max="{{ $pesoMaximo}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" step="0.01">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="talla" class="col-sm-2 col-form-label">Talla:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="talla" name="talla" placeholder="Ingrese su talla" step="0.01">
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
        <!-- Oculto boton nuevo
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/gallo/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        -->
        <div class="row">
            <div class="col">
                <form action="{{ url('/gallo/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar gallo"> <span class="input-group-btn">
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
                                <th scope="col">REPRESENTANTE</th>
                                <th scope="col">PLACA</th>
                                <th scope="col">PESO</th>
                                <th scope="col">EDAD</th>
                                <th scope="col">TALLA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($gallos)
                                @foreach ($gallos as $gallo)
                                    <tr class="clickTabla-fila">
                                        <th scope="row">{{ $loop -> iteration}}</th>
                                        <td>{{ $gallo->representante->NOMBRES }}</td>
                                        <td>{{ $gallo -> PLACA }}</td>
                                        <td>{{ $gallo -> PESO }}</td>
                                        <td>{{ $gallo -> EDAD }}</td>
                                        <td>{{ $gallo -> TALLA }}</td>
                                        <td>
                                            @switch($gallo->ESTADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('S')
                                                    Suspendido
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/gallo/ver/'.$gallo->ID_GALLO) }}"> <i class="fa fa-file-text-o"></i> </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/gallo/editar/'.$gallo->ID_GALLO) }}"> <i class="fa fa-pencil-square-o"></i> </a>
                                             <!-- Botón trigger modal -->
                                             <button type="button" id="criaderoBoton" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal" data-id="{{ $gallo->ID_GALLO }}">
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
                @isset($gallos)
                    {{ $gallos->links() }}    
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
                    var url = "/gallo/eliminar/"+id;
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

            $('#representante').select2({
                width: 'resolve' 
            });

        });
    </script>
@endsection
