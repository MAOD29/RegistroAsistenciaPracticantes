@extends('layouts.snavbar')
@section('content')



	<!--<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{route('colaborador.index')}}">Colaborador</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Crear Colaborador</li>
	  </ol>
	</nav> -->
	
	<form method="POST" action="{{ route('colaborador.store' )}}" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" >
			
			@include('alumnos.form',['colaborador'=> new App\Colaborador])
			

			<input class="btn boton" type="submit" value="Guardar">
			<!-- btn btn-success -->

		</form>

@stop
