@extends('layouts.snavbar')
@section('content')

	<h1>Crear Curso</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Cursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Activar Tema</li>
	  </ol>
	</nav>

	<form method="POST" action="{{ route('activacion.update',$tema->id )}}" autocomplete="off" >
			{!! csrf_field()  !!}
			{!! method_field('PUT') !!}
			<input type="hidden" name="activar" value="si">
			<label for="fecha_inicial">Fecha de inicio<input class="form-control" type="date" name="fecha_inicial" ></label>
			<label for="fecha_final">Fecha final<input class="form-control" type="date" name="fecha_final" ></label>
			<input class="btn btn-success" type="submit" value="Guardar">


		</form>

@stop 