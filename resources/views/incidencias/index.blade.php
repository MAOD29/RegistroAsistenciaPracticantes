@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<div class="row" >
		  <div class="col-8">
		  	<a href="{{ route('incidencias.create') }}" class="btn btn-success pull-rigth ">Crear incidencias</a>
		  </div>

		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('incidencias.index')}}" autocomplete="off"> 
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
				<th>codigo</th>
				<th>Nombre</th>
				<th>Departamento</th>
				<th>Fecha</th>
				<th>Tipo de incidencia</th>
				<th>Observaciones</th>
				<th>Acciones</th>
				
			</tr> 
		</thead>
		@foreach($incidencias as $incidencia)
		<tbody>
					<td>{{$incidencia->codigo_colaborador}}</td>
					<td>{{$incidencia->colaborador->pluck('nombre')->implode('-')}}</td>
					<td>{{$incidencia->colaborador->pluck('departamento')->implode('-')}}</td>
					<td>{{$incidencia->fecha}}</td>
					<td>{{$incidencia->tipo}}</td>
					<td>{{$incidencia->observaciones}}</td>
					<td>
							<!--<a class="btn btn-info btn-sm" href="{{ route('incidencias.show', $incidencia->id )}}">ver</a> -->
						 <a class="btn btn-info btn-sm" href="{{ route('incidencias.edit', $incidencia->id )}}">Editar</a>
						 <form style="display: inline;" method="POST" action="{{ route('incidencias.destroy',$incidencia->id) }}">
							 {!! csrf_field()  !!}
							 {!! method_field('DELETE') !!}
							 <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						 </form> 
					 </td>
			</tbody>
			@endforeach
	</table>

	@endsection

