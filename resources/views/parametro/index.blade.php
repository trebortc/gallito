@extends('diseno.master')
@section('titulo','Parametros')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/parametro/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">VALOR</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parametros as $parametro)
                                <tr>
                                    <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $parametro -> NOMBRE_PARAMETRO }}</td>
                                    <td>{{ $parametro -> VALOR }}</td>
                                    <td><a href="{{ url('/parametro/ver/'.$parametro->NOMBRE_PARAMETRO) }}">Ver</a></td>
                                    <td><a href="{{ url('/parametro/editar/'.$parametro->NOMBRE_PARAMETRO) }}">Editar</a></td>
                                    <td><a href="{{ url('/parametro/eliminar/'.$parametro->NOMBRE_PARAMETRO) }}">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
