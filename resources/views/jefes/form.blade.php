{!! csrf_field()  !!}
<div class="row fuente">
	@if($jefe->clave)
		<div class="col-4">
				<label for="clave">ID</label>
				<input class="form-control" type="text" name="id"  value="{{$jefe->id }}" readonly placeholder="Ingrese clave del profesor">
			{!! $errors->first('clave', '<span class=error>:message</span>') !!}
		</div>
	@endif
</div>
<br>
 <div class="row fuente">
	 
	  <div class="col-4">
	  	<label for="nombre">Nombre</label>
	  	<input class="form-control" type="text" name="nombre" value="{{$jefe->nombre }}" placeholder="Ingrese nombre del maestro">
		{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
	  </div>

	  <div class="col-4">
	  	<label for="paterno" >Apellidos</label>
		<input class="form-control" type="text" name="apellidos" value="{{$jefe->apellidos }}" placeholder="Ingrese apellido materno">
		{!! $errors->first('apellidos', '<span class=error>:message</span>') !!}
		
	  </div>

	  <div class="col-4">
	  	<label for="materno" >Departamento</label>
		<input class="form-control" type="text" name="departamento" value="{{$jefe->departamento }}" placeholder="Ingrese apellido materno">
		{!! $errors->first('departamento', '<span class=error>:message</span>') !!}
		
	  </div>

</div>
	<br>
