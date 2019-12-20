@extends('layouts.snavbar')
@section('content')

<h1><p>Matricula: {{$user->name}}</p></h1>

@if($user->roles->pluck('display_name')->implode(' - ') === 'Moderador')

<table class="table">
		<tr>
			<td>Nombre</td>
			<td>{{$user->profesor->nombre}} {{ $user->profesor->paterno }} {{ $user->profesor->materno }}</td>
		</tr>
		<tr>
			<td>Cargo</td>
			<td>{{ $user->profesor->cargo }}</td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<td>Role</td>
			<td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
		</tr>
	</table>
	

@elseif($user->roles->pluck('display_name')->implode(' - ') === 'Estudiante')
	<table class="table">
		<tr>
			<td>Nombre</td>
			<td>{{$user->alumno->nombre}} {{ $user->alumno->paterno }} {{ $user->alumno->materno }}</td>
		</tr>
		<tr>
			<td>Semestre</td>
			<td>{{ $user->alumno->grupo->semestre}}</td>
		</tr>
		<tr>
			<td>Grupo</td>
			<td>{{ $user->alumno->grupo->nombre }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$user->email}}</td>
		</tr>
		<tr>
			<td>Role</td>
			<td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
		</tr>
	</table>
@endif


@can('before',  $user)
	<a class="btn btn-info btn.xs" href="{{ route('usuarios.edit', $user->id )}}">Editar</a>
					
					<form style="display: inline;" method="POST" action="{{ route('usuarios.destroy',$user->id) }}">

						{!! csrf_field()  !!}
						{!! method_field('DELETE') !!}

						<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
					</form> 
@endcan	

@stop