@extends('layouts.snavbar')
@section('content')
@include('tarjetaform')
      
      <a class="btn btn-success " href="{{ route('pdftarjeta/', $colaborador->id )}}">imprimir tajeta</a>
            <a class="btn btn-info " href="{{ route('colaborador.edit', $colaborador->id )}}">Editar</a>
               
@stop