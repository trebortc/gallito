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
                                <th scope="col">IDENTIFICACION</th>
                                <th scope="col">NOMBRES</th>
                                <th scope="col">TELEFONOS</th>
                                <th scope="col">CORREO</th>
                                <th scope="col">DESCRIPCION</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscripciones as $inscripcion)
                                <tr>
                                <th scope="row">{{ $loop -> iteration }}</th>
                                    
                                    <td>{{ $inscripcion -> criadero -> NOMBRE }}</td>
                                    <td>{{ $inscripcion -> IDENTIFICACION }}</td>
                                    <td>{{ $inscripcion -> NOMBRES }}</td>
                                    <td>{{ $inscripcion -> TELEFONOS }}</td>
                                    <td>{{ $inscripcion -> CORREO }}</td>
                                    <td>{{ $inscripcion -> DESCRIPCION }}</td>
                                    <td>{{ $inscripcion -> ETADO }}</td>
                                    <td><a href="{{ url('/representante/ver/'.$inscripcion->ID_REPRESENTANTE) }}"> Ver detalles </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
