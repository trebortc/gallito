@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end p-4">
                    <a href="{{ url('/criadero/nuevo') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Nuevo</a>
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
                                <th scope="col">ESTADO</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criaderos as $criadero)
                                <tr>
                                <th scope="row">{{ $loop -> iteration}}</th>
                                    <td>{{ $criadero -> NOMBRE }}</td>
                                    <td>{{ $criadero -> DESCRIPCION }}</td>
                                    <td>{{ $criadero -> ESTADO }}</td>
                                    <td><a href="{{ url('/criadero/ver'.$criadero->ID_CRIADEROS) }}"> Ver </a></td>
                                    <td><a href="{{ url('/criadero/actualizar'.$criadero->ID_CRIADEROS)}}"> Actualizar </a></td>
                                    <td><a href="{{ url('/criadero/eliminar'.$criadero->ID_CRIADEROS)}}"> Eliminar </a></td>
                                    <td><a href="{{ url('/criadero/estado'.$criadero->ID_CRIADEROS)}}"> estado </a></td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
