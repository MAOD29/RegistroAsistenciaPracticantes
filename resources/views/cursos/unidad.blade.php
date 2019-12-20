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

	<form method="POST" action="{{ route('unidad.store' )}}" autocomplete="off" >
			

	@include('cursos.form-unidad')
	
	
	<br>
		<input class="btn boton" type="submit" value="Guardar">
		@if($terminar)
			<a class="btn btn-danger "  href="{{ route('cursos.create')}}">Terminar Curso</a>
		@endif	
		</form>

@stop