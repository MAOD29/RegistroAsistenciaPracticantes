@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	
    <h1>Asesores</h1>    
  
	<div class="row" >
		  <div class="col-8">
		  	<a href="{{ route('jefe.create') }}" class="btn btn-success pull-rigth ">Crear Asesor</a>
		  </div>

		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('jefe.index')}}" autocomplete="off"> 
		      <label for="search" >
				<input class="form-control" type="text" name="search" placeholder="Ingrese Clave o Nombre">
			  </label>
	      		<input class="btn btn-primary" type="submit" value="Buscar">
	 		</form>
		  </div>		

	</div>
	<br><br><br>
    <table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Depratamento</th>
				<th>Aciiones</th>

			</tr> 
		</thead>

		<tbody>
			@foreach ($jefes as $jefe)
			<tr>
			<td>{{ $jefe->id }}</td>
			<td>{{ $jefe->nombre }}</td>
			<td>{{ $jefe->apellidos }}</td>
			<td>{{ $jefe->departamento }}</td>
			<td>
						 <!--<a class="btn btn-info btn-sm" href="{{ route('jefe.show', $jefe->id )}}">ver</a> -->
						<a class="btn btn-info btn-sm" href="{{ route('jefe.edit', $jefe->id )}}">Editar</a>
						<form style="display: inline;" method="POST" action="{{ route('jefe.destroy',$jefe->id) }}">
							{!! csrf_field()  !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form> 
					</td>
			</tr>
			@endforeach
			{!! $jefes->fragment('hash')->appends(request()->query())->links() !!}
		</tbody>
	</table>

@stop