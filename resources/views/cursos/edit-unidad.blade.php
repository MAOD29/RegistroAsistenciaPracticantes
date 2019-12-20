@extends('layouts.snavbar')
@section('content')
	<h1>Crear Unidad</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Cursos</a></li>
	    <li class="breadcrumb-item">Crear Cursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Unidad</li>
	  </ol>
	</nav>

	<form method="POST" action="{{ route('unidad.update',$uni->id)}}" autocomplete="off" >
		{!! method_field('PUT') !!}
		@include('cursos.form-unidad')

		<input class="btn btn-success" type="submit" value="Guardar">
	
	</form>

@stop