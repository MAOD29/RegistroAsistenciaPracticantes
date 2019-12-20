@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	
    <h1>Cursos</h1>    
    <br>
	<div class="row" >
		  <div class="col-8">
		  	<a href="{{ route('cursos.create') }}" class="btn btn-success pull-rigth ">Crear Curso</a>
		  </div>

		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('cursos.index')}}" autocomplete="off"> 
		      <label for="search" >
				<input class="form-control" type="text" name="search" placeholder="Ingrese Nombre">
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
				 <th>Acciones</th>
			</tr> 
		</thead>

		<tbody>
			@foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->id }}</td>
					<td>{{ $dato->name }}</td>
					<td>
					<a class="btn btn-info  btn-sm" href="{{ route('cursos.show', $dato->id )}}">ver</a>
					<a class="btn btn-info  btn-sm" href="{{ route('porcentaje', $dato->id )}}">Asignar Porcentaje</a>
						<!--<a class="btn btn-info btn-sm" href="{{ route('cursos.edit', $dato->id )}}">Editar</a>-->
						@if ($user->roles->pluck('display_name')->implode(' - ') == 'Administrador'  )
						<form style="display: inline;" method="POST" action="{{ route('cursos.destroy',$dato->id) }}">
							{!! csrf_field()  !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger  btn-sm" type="submit">Eliminar</button>
						</form> 
						@endif
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

@stop
