@extends('diseno.master')
@section('titulo','Criaderos')
@section('contenido')
    <h1> NOMBRE CRIADERO: {{ $representante -> NOMBRE }} </h1>
    <a href="{{ '/criadero' }}"> Regresar 1</a>
    <a href="{{ url()->previous() }}"> Regresar 2</a>
@endsection