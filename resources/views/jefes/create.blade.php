@extends('layouts.snavbar')
@section('content')


	<form method="POST" action="{{ route('jefe.store' )}}" autocomplete="off" >
			
			@include('jefes.form',['jefe'=> new App\Jefe])
			

			<input class="btn boton" type="submit" value="Guardar">


		</form>

@stop