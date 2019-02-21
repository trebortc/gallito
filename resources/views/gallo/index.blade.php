@extends('diseno.master')
@section('titulo','Gallo')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/gallo/nuevo') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Nuevo</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ url('/gallo/buscar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="input-group p-4">
                        <input type="text" class="form-control" name="textoBuscar"
                            placeholder="Buscar gallo"> <span class="input-group-btn">
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
                                <th scope="col">REPRESENTANTE</th>
                                <th scope="col">PLACA</th>
                                <th scope="col">PESO</th>
                                <th scope="col">EDAD</th>
                                <th scope="col">TALLA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($gallos)
                                @foreach ($gallos as $gallo)
                                    <tr>
                                        <th scope="row">{{ $loop -> iteration}}</th>
                                        <td>{{ $gallo->representante->NOMBRES }}</td>
                                        <td>{{ $gallo -> PLACA }}</td>
                                        <td>{{ $gallo -> PESO }}</td>
                                        <td>{{ $gallo -> EDAD }}</td>
                                        <td>{{ $gallo -> TALLA }}</td>
                                        <td>
                                            @switch($gallo->ESTADO)
                                                @case('A')
                                                    Activo
                                                    @break
                                                @case('S')
                                                    Suspendido
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/gallo/ver/'.$gallo->ID_GALLO) }}"> Ver </a>
                                            <a class="btn btn-secondary btn-sm" href="{{ url('/gallo/editar/'.$gallo->ID_GALLO) }}"> Editar </a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('/gallo/eliminar/'.$gallo->ID_GALLO) }}"> Eliminar </a>
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
                @isset($gallos)
                    {{ $gallos->links() }}    
                @endisset
            </div>
        </div>
    </div>
@endsection
