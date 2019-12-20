@extends('layouts.snavbar')
@section('content')

	<h1>Crear Pregunta</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Cursos</a></li>
	    <li class="breadcrumb-item">Crear Cursos</a></li>
	    <li class="breadcrumb-item">Crear Unidad</a></li>
	    <li class="breadcrumb-item">Crear Tema</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Pregunta</li>
	  </ol>
	</nav>

	<form method="POST" action="{{ route('pregunta.store')}}" autocomplete="off" >
			
		@include('cursos.form-pregunta',['pregunta'=> new App\Texto])	
		<input class="btn btn-success" type="submit" value="Guardar Y Siguiente pregunta">
		<a class="btn btn-danger " href="{{ route('temas.show', $unidad->id )}}">Guardar Y Terminar tema</a>
		</form>

@stop