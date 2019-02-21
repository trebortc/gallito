@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ route('inscripcion_torneo_nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('inscripcion_torneo_buscar') }}" method="POST">
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
                    <table class="table">
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
                                    <tr>
                                        <th scope="row">{{ $loop -> iteration }}</th>
                                        <td>{{ $inscripcion -> criadero -> NOMBRE }}</td>
                                        <td>{{ $inscripcion -> NOMBRE_REPRESENTANTE }}</td>
                                        <td>{{ $inscripcion -> PLACA_GALLO }}</td>
                                        <td>{{ $inscripcion -> PESO_GALLO }}</td>
                                        <td>{{ $inscripcion -> ESTADO }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/representante/ver/'.$inscripcion->ID_REPRESENTANTE) }}"> Ver </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/representante/editar/'.$inscripcion->ID_REPRESENTANTE) }}"> Editar </a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('/representante/eliminar/'.$inscripcion->ID_REPRESENTANTE) }}"> Eliminar </a>
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
