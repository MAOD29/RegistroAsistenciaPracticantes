@extends('layouts.snavbar')
@section('content')



	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item" > <a href="{{ route('cursos.index' )}}" >Cursos</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Curso</li>
	  </ol>
	</nav>

	<form method="POST" action="{{ route('cursos.store' )}}" autocomplete="off" >
			
			@include('cursos.form',['curso'=> new App\Curso])
			

			<input class="btn boton" type="submit" value="Guardar">


		</form>

@stop