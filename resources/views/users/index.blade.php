@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	
      
    <br>
	<div class="row" >
		 <div class="col-8">
			<h1>Usuarios</h1>  
		  </div>

		  <div class="ml-auto col-4 ">
		  	<form method="GET" action="{{ route('usuarios.index')}}" autocomplete="off"> 
		      <label for="search" >
				<input class="form-control" type="text" name="search" placeholder="Ingrese Clave">
			  </label>
	      		<input class="btn btn-primary" type="submit" value="Buscar">
	 		</form>
		  </div>
	</div>
	<br><br>
    <table class="table">
		<thead>
			<tr>
			
				<th>Clave de usuario</th>
				 <th>Email</th>
				 <th>Role</th>
				 <th>Acciones</th>
			</tr> 
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
				
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
						<td>
							<!-- usando los metodos de collection puedo entrar a las caracteristicas del array
								y con el uso de eloquen automaticamente trae datos de la BD  -->
							{{ $user->roles->pluck('display_name')->implode(' - ') }}
					<!-- esta es la opcion de mostrar los roles pero con un for recorriendo el array
							@foreach($user->roles as $role)
							{{$role->display_name }}
							@endforeach
						-->
						</td>
					<td>
					
						
						
						

						@if ($user->roles->pluck('display_name')->implode(' - ') != 'Administrador'  )
							<a class="btn btn-info  btn-sm" href="{{ route('usuarios.show', $user->id )}}">ver</a>
							<a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $user->id )}}">Editar</a>
						<form style="display: inline;" method="POST" action="{{ route('usuarios.destroy',$user->id) }}">
							{!! csrf_field()  !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger  btn-sm" type="submit">Eliminar</button>
						</form> 
						@endif
					</td>
				</tr>
			@endforeach
			{!! $users->fragment('hash')->appends(request()->query())->links() !!}
		</tbody>
	</table>

@stop