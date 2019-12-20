@extends('layouts.snavbar')
@section('content')



	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
		
	@endif

	<form method="POST" action="{{ route('jefe.update', $jefe->id) }}" autocomplete="off">
			{!! method_field('PUT') !!}
			@include('jefes.form')
			<input class="btn boton" type="submit" value="Actualizar">


		</form>

@stop
