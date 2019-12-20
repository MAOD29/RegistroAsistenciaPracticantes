@extends('layouts.snavbar')
@section('content')

	<h1>Crear Tema</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Cursos</a></li>
	    <li class="breadcrumb-item">Crear Cursos</a></li>
	    <li class="breadcrumb-item">Crear Unidad</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Tema</li>
	  </ol>
	</nav>
	

	<form method="POST" action="{{ route('temas.store' )}}" autocomplete="off" >
			
	{!! csrf_field()  !!}

	<div class="row fuente">
			
			<input type="hidden" name="id_unidad" value="{{ $id->id }}">

			<div class="col-4">
		  	<label for="id_unidad">Nombre de curso</label>
		  	<input class="form-control" type="text"  value="{{ $curso->name }}" readonly>
		  </div>

		   <div class="col-4">
		  	<label >Nombre de unidad</label>
		  	<input class="form-control" type="text"  value="{{ $id->name }}" readonly>
			
		  </div>
		  <div class="col-4">
		  	<label for="nombre">Nombre de tema</label>
		  	<input class="form-control" type="text" name="nombre"  placeholder="">
			{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
		  </div>
		
	</div>
	<br>
		<input class="btn boton " type="submit" value="Guardar">
		@if($terminar)
			<a class="btn btn-danger "  href="{{ route('unidad.show', $curso->id )}}">Terminar Unidad</a>
		@endif	
		</form>

@stop