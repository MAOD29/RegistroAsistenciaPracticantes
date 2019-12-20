<br><br>
{!! csrf_field()  !!}
<div class="form-group row fuente">
	  
	  <div class="col-6">
		<label for="nombre"> Nombre</label>
			<input class="form-control" type="text" name="name" readonly value="{{ $user->name }}" placeholder="Ingrese nombre">
			{!! $errors->first('name', '<span class=error>:message</span>') !!}
		
	  </div>
	  <div class="col-6">
		<label for="email"> Email</label>
			<input class="form-control "  type="email" name="email" value="{{ $user->email }}" placeholder="Ingrese email de autenticación">
			{!! $errors->first('email',  '<span class=error>:message</span>') !!}
			
	  </div>

	  
</div>
	<br>
<div class="row fuente">

	<div class="col-6">
	  	<label for="password">Contraseña</label>
			<input class="form-control" type="password" name="password"  placeholder="Ingrese contraseña">
			{!! $errors->first('password', '<span class=error>:message</span>') !!}
		
	</div>

	<div class="col-6">
		<label for="password_confirmation" >Confirmar contraseña</label>
			<input class="form-control" type="password" name="password_confirmation" placeholder="Repetir contraseña">
			{!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
		
	</div>

	  <!--<div class="col-4">
	  		<label>Elegir Rol</label>
			@unless ($user->id == auth()->user()->hasRoles(['admin','otrorole']))

				<div class="checkbox">
					@foreach ($roles as $id => $name)
						<label>
							<input type="checkbox" value="{{ $id }}" 
							 {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
							 name="roles[]">{{ $name}}		 
						</label>
					@endforeach
					{!! $errors->first('roles', '<span class=error>:message</span>') !!}
				</div> 
			@endunless

	  </div>-->
</div>
