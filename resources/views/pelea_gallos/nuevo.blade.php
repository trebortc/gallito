@extends('diseno.master')
@section('titulo','Pelea Gallos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Pelea Gallos - Nuevo</h1>
                <br>
                <form action=" {{ url('/pelea_gallos/crear') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Gallo 1:</label>
                        <div class="col-sm-8">
                            <select name="id_descripcion" id="id_descripcion" class="form-control">
                                <option value="-1">Seleccione una opción:</option>
                                @foreach ($inscripcionesTorneo as $inscripcionTorneo)
                                    <option value="{{ $inscripcionTorneo -> ID_TORNEO }}">{{ $inscripcionTorneo -> PLACA_GALLO }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Gallo 2:</label>
                        <div class="col-sm-8">
                            <select name="ins_id_descripcion" id="ins_id_descripcion" class="form-control">
                                <option value="-1">Seleccione una opción:</option>
                                @foreach ($inscripcionesTorneo as $inscripcionTorneo)
                                    <option value="{{ $inscripcionTorneo -> ID_TORNEO }}">{{ $inscripcionTorneo -> PLACA_GALLO }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                         
                    <div class="form-group row">
                        <label for="resultado" class="col-sm-2 col-form-label">Resultado:</label>
                        <div class="col-sm-8">
                            <select name="resultado" id="resultado" class="form-control">
                                <option value="-1">Seleccione ganador:</option>
                                @foreach ($inscripcionesTorneo as $inscripcionTorneo)
                                    <option value="{{ $inscripcionTorneo -> PLACA_GALLO }}">{{ $inscripcionTorneo -> PLACA_GALLO }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempo" class="col-sm-2 col-form-label">Tiempo:</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="tiempo" name="tiempo" placeholder="Escriba la duración de pelea">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="observacion" class="col-sm-2 col-form-label">Observación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="observacion" name="observacion" placeholder="Escriba lobservación de pelea">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
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

