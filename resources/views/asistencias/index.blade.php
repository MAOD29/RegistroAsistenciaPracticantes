@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<form method="GET" action="{{ route('asistencias.index')}}" autocomplete="off"> 
		<div class="row" >
				<div class="col-2">
						<label for="fecha_inicial"><input class="form-control" type="date" name="fecha_inicial" > </label>
				</div>
				<div class="col-4">
						<label for="fecha_final"><input class="form-control" type="date" name="fecha_final" > </label>
					</div>
				<div class="ml-auto col-4 ">
						<label for="search" >
					<input class="form-control" type="text" name="search" placeholder="Indicio de busqueda">
					</label>
							<input class="btn btn-primary" type="submit" value="Buscar">
				</div>
		</div>
</form>
	<br>
    <table class="table">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Departamento</th>
				<th>Fecha</th>
				<th>Hora de entrada</th>
				<th>Hora de salida</th>
				<th>Horas del día</th>
				
			
			</tr> 
		</thead>
		<tbody>
			@foreach ($asistencias as $key)
			<tr>
			<td>{{ $key->id_colaborador }}</td>
            <td>{{ $key->colaborador->pluck('nombre')->implode(' - ') }} 
                {{ $key->colaborador->pluck('apellidos')->implode(' - ') }}
						</td>
						<td>{{ $key->colaborador->pluck('departamento')->implode(' - ') }} 
               
						</td>
					<td>{{ $key->fecha }}</td>
			<td>{{ $key->hora_entrada }}</td>
			<td>{{ $key->hora_salida }}</td>
			<td>{{ $key->horast}}</td>
		
			
			</tr>
			@endforeach
			@if($type == true)
			{!! $asistencias->fragment('hash')->appends(request()->query())->links() !!}
			@endif
			
		</tbody>
	</table>

	@endsection

