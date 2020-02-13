@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
        <div class="container">
            <div class="row">
                <div class="col">
                    <br>
                    <h1>Criadero - Nuevo</h1>
                    <form action=" {{ url('/criadero/crear') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba el nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">Ubicacion:</label>
                            <div class="col-sm-10">
                                <select name="descripcion" id="descripcion" class="form-control">
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
                                    <option value="Pic">Pichincha</option>
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
@endsection

