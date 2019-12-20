@extends('layouts.snavbar')
@section('content')
	

	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
		
	@endif
	<!--
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="{{route('colaborador.index')}}">Alumnos</a></li>
		  <li class="breadcrumb-item active" aria-current="page">Editar Alumno</li>
		</ol>
	  </nav>
	-->


	<form method="POST" action="{{ route('colaborador.update', $colaborador->id) }}" accept-charset="UTF-8" enctype="multipart/form-data" autocomplete="off">
			{!! method_field('PUT') !!}
			@include('alumnos.form')
			<input class="btn boton" type="submit" value="Actualizar">

		</form>

@stop
