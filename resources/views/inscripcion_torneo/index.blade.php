@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ route('inscripcion_torneo_nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">CRIADERO</th>
                                <th scope="col">REPRESENTANTE</th>
                                <th scope="col">PLACA GALLO</th>
                                <th scope="col">PESO GALLO</th>
                                <th scope="col">EDAD GALLO</th>
                                <th scope="col">TALLA GALLO</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscripciones as $inscripcion)
                                <tr>
                                <th scope="row">{{ $loop -> iteration }}</th>
                                    
                                    <td>{{ $inscripcion -> criadero -> NOMBRE }}</td>
                                    <td>{{ $inscripcion -> NOMBRE_REPRESENTANTE }}</td>
                                    <td>{{ $inscripcion -> PLACA_GALLO }}</td>
                                    <td>{{ $inscripcion -> PESO_GALLO }}</td>
                                    <td>{{ $inscripcion -> EDAD_GALLO }}</td>
                                    <td>{{ $inscripcion -> TALLA_GALLO }}</td>
                                    <td>{{ $inscripcion -> ESTADO }}</td>
                                    <td><a href="{{ url('/representante/ver/'.$inscripcion->ID_REPRESENTANTE) }}"> Ver </a></td>
                                    <td><a href="{{ url('/representante/editar/'.$inscripcion->ID_REPRESENTANTE) }}"> Editar </a></td>
                                    <td><a href="{{ url('/representante/eliminar/'.$inscripcion->ID_REPRESENTANTE) }}"> Eliminar </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
