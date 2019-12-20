@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<div class="row" >
		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('faltas')}}" autocomplete="off"> 
		      <label for="search" >
				<input class="form-control" type="text" name="search" placeholder="Ingresar clave del colaborador">
			  </label>
	      		<input class="btn btn-primary" type="submit" value="Buscar">
	 		</form>
		  </div>
	</div>
    <br>
<form method="POST" action="{{ route('incidencias.store' )}}"  autocomplete="off" >

        @include('incidencias.form',['incidencias'=> new App\incidencia])
        
</form>
@endsection