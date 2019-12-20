@extends('layouts.snavbar')
@section('content')

	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Cursos</a></li>
	    <li class="breadcrumb-item">Crear Cursos</a></li>
	    <li class="breadcrumb-item">Crear Unidad</a></li>
	    <li class="breadcrumb-item">Crear Tema</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Texto</li>
	  </ol>
	</nav>

	<form method="POST" action="{{ route('textos.store' )}}" autocomplete="off" >
		
		@include('cursos.form-texto',['text'=> new App\Texto])			
	
		<input class="btn boton" type="submit" value="Guardar">
		</form>
@stop