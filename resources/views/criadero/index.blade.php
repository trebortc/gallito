@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    @include('modals.eliminar')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <br>
                <h3>Criadero - Nuevo</h3>
                <form action=" {{ url('/criadero/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label">Ubicación:</label>
                        <div class="col-sm-10">
                            <select name="descripcion" id="id_descripcion" class="form-control">
                                <option value="Azu">Azuay</option>
                                <option value="Bol">Bolívar</option>
                                <option value="Cañ">Cañar</option>
                                <option value="Car">Carchi</option>
                                <option value="Chi">Chimborazo</option>
                                <option value="Cot">Cotopaxi</option>
                                <option value="ElO">El Oro</option>
                                <option value="Esm">Esmeraldas</option>
                                <option value="Gal">Galápagos</option>
                                <option value="Gua">Guayas</option>
                                <option value="Imb">Imbabura</option>
                                <option value="Loj">Loja</option>
                                <option value="Los">Los Ríos</option>
                                <option value="Man">Manabí</option>
                                <option value="Mor">Morona Santiago</option>
                                <option value="Nap">Napo</option>
                                <option value="Ore">Orellana</option>
                                <option value="Pas">Pastaza</option>
                                <option selected="selected" value="Pic">Pichincha</option>
                                <option value="SanE">Santa Elena</option>
                                <option value="SanD">Santo Domingo de los Tsáchilas</option>
                                <option value="Sucu">Sucumbíos</option>
                                <option value="Tung">Tungurahua</option>
                                <option value="Zamo">Zamora Chinchipe</option>      
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
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
    <div class="container">
        <!-- Oculto boton nuevo
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/criadero/nuevo') }}" class="btn btn-light btn-lg active" role="button" aria-pressed="true"><i class="fa fa-file-o"></i></a>
                </div>
            </div>
        </div>
        -->
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
                            @isset($criaderos)
                                @foreach ($criaderos as $criadero)
                                <tr class="clickTabla-fila">
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $criadero -> NOMBRE }}</td>
                                    <td>
                                        @switch($criadero -> DESCRIPCION)
                                            @case('Azu') Azuay @break
                                            @case('Bol') Bolívar @break
                                            @case('Cañ') Cañar @break
                                            @case('Car') Carchi @break
                                            @case('Chi') Chimborazo @break
                                            @case('Cot') Cotopaxi @break
                                            @case('ElO') El Oro @break
                                            @case('Esm') Esmeraldas @break
                                            @case('Gal') Galápagos @break
                                            @case('Gua') Guayas @break
                                            @case('Imb') Imbabura @break
                                            @case('Loj') Loja @break
                                            @case('Los') Los Ríos @break
                                            @case('Man') Manabí @break
                                            @case('Mor') Morona Santiago @break
                                            @case('Nap') Napo @break
                                            @case('Ore') Orellana @break
                                            @case('Pas') Pastaza @break
                                            @case('Pic') Pichincha @break
                                            @case('SanE') Santa Elena @break
                                            @case('SanD') Santo Domingo de los Tsáchilas @break
                                            @case('Sucu') Sucumbíos @break
                                            @case('Tung') Tungurahua @break
                                            @case('Zamo') Zamora Chinchipe @break
                                        @endswitch
                                    </td>
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

            $('#id_descripcion').select2({
                width: 'resolve' 
            });

        });
    </script>
@endsection
