@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/gallo/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">PLACA</th>
                                <th scope="col">PESO</th>
                                <th scope="col">EDAD</th>
                                <th scope="col">TALLA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallos as $gallo)
                                <tr>
                                <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $gallo -> PLACA }}</td>
                                    <td>{{ $gallo -> PESO }}</td>
                                    <td>{{ $gallo -> EDAD }}</td>
                                    <td>{{ $gallo -> TALLA }}</td>
                                    <td>{{ $gallo -> ESTADO }}</td>
                                    <td><a href="{{ url('/gallo/ver'.$gallo->ID_GALLO) }}"> Ver detalles </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
