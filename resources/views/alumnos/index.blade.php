@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	
        
    
	<div class="row" >
		  <div class="col-8">
		  	<a href="{{ route('colaborador.create') }}" class="btn btn-success pull-rigth ">Crear practicante</a>
		  </div>

		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('colaborador.index')}}" autocomplete="off"> 
		      <label for="search" >
				<input class="form-control" type="text" name="search" placeholder="Indicio de busqueda">
			  </label>
	      		<input class="btn btn-primary" type="submit" value="Buscar">
	 		</form>
		  </div>
	</div>
	<br>
    <table class="table">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Departamento</th>
	
				<th>Email</th>
				<th>Accion</th>
			</tr> 
		</thead>

		<tbody>
			@foreach ($colaboradores as $alumno)
			<tr>
			<td>{{ $alumno->codigo }}</td>
			<td>{{ $alumno->nombre }}</td>
			<td>{{ $alumno->apellidos }}</td>
			<td> {{ $alumno->departamento}}</td>
			
			<td>{{ $alumno->email }}</td>
			<td>
						<a class="btn btn-info btn-sm" href="{{ route('colaborador.show', $alumno->id )}}">Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('colaborador.edit', $alumno->id )}}">Editar</a>
						<form style="display: inline;" method="POST" action="{{ route('colaborador.destroy',$alumno->id) }}">
							{!! csrf_field()  !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form> 
					</td>
			</tr>
			@endforeach
			{!! $colaboradores->fragment('hash')->appends(request()->query())->links() !!}
		</tbody>
	</table>

	@endsection

