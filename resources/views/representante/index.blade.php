@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/representante/nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ url('/representante/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar representante"> <span class="input-group-btn">
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
                                <th scope="col">IDENTIFICACION</th>
                                <th scope="col">NOMBRES</th>
                                <th scope="col">TELEFONOS</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($representantes)
                                @foreach ($representantes as $representante)
                                    <tr>
                                        <th scope="row">{{ $loop -> iteration }}</th>
                                        <td>{{ $representante -> criadero -> NOMBRE }}</td>
                                        <td>{{ $representante -> IDENTIFICACION }}</td>
                                        <td>{{ $representante -> NOMBRES }}</td>
                                        <td>{{ $representante -> TELEFONOS }}</td>
                                        <td>
                                            @switch($representante->ETADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('S')
                                                    Suspendido
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/representante/ver/'.$representante->ID_REPRESENTANTE) }}"> Ver </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/representante/editar/'.$representante->ID_REPRESENTANTE)}}"> Editar </a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('/representante/eliminar/'.$representante->ID_REPRESENTANTE)}}"> Eliminar </a>
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
                @isset($representantes)
                    {{ $representantes->links() }}
                @endisset
            </div>
        </div>
    </div>
@endsection
