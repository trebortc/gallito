@extends('diseno.master')
@section('titulo','Torneos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/torneo/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DESCRIPCIÓN</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($torneos as $torneo)
                                <tr>
                                <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $torneo -> NOMBRE }}</td>
                                    <td>{{ $torneo -> DESCRIPCION }}</td>
                                    <td>{{ $torneo -> FECHA }}</td>
                                    <td>{{ $torneo -> ESTADO }}</td>
                                    <td><a href="{{ url('/torneo/ver'.$torneo->ID_TORNEO) }}"> Ver detalles </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
