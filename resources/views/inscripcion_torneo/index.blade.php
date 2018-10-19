@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/representante/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                            @foreach ($representantes as $representante)
                                <tr>
                                <th scope="row">{{ $loop -> iteration }}</th>
                                    
                                    <td>{{ $representante -> criadero -> NOMBRE }}</td>
                                    <td>{{ $representante -> IDENTIFICACION }}</td>
                                    <td>{{ $representante -> NOMBRES }}</td>
                                    <td>{{ $representante -> TELEFONOS }}</td>
                                    <td>{{ $representante -> CORREO }}</td>
                                    <td>{{ $representante -> DESCRIPCION }}</td>
                                    <td>{{ $representante -> ETADO }}</td>
                                    <td><a href="{{ url('/representante/ver'.$representante->ID_REPRESENTANTE) }}"> Ver detalles </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
