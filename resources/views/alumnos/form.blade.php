{!! csrf_field()  !!}

@if($colaborador->codigo)
	<div class="row fuente">
		<div class="col-4">
				<label for="codigo">codigo</label>
				<input class="form-control" type="text" name="codigo" readonly value="{{$colaborador->codigo }}" placeholder="Ingrese matricula del alumno">
			{!! $errors->first('codigo', '<span class=error>:message</span>') !!}
			</div>
	</div>
@else
<div class="row fuente">
		<div class="col-4">
				<label for="codigo">Código</label>
				<input class="form-control" type="text" name="codigo"   placeholder="Ingrese código del colaborador">
			{!! $errors->first('codigo', '<span class=error>:message</span>') !!}
			</div>
	</div>
@endif
<br>
<div class="row fuente">
	  <!-- <div class="col-4">
	  	<label for="matricula">Matricula</label>
	    <input class="form-control" type="text" name="matricula"  value="{$alumno->matricula }}" placeholder="Ingrese matricula del alumno">
	  		!! $errors->first('matricula', '<span class=error>:message</span>') !!}
	  </div> -->

	  <div class="col-4">
	  	<label for="nombre">Nombre</label>
	  	<input class="form-control" type="text" name="nombre" value="{{$colaborador->nombre }}" placeholder="Ingrese nombre del alumno">
		{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
	  </div>

	  <div class="col-4">
	  	<label for="paterno" >Apellidos</label>
		<input class="form-control" type="text" name="apellidos" value="{{$colaborador->apellidos }}" placeholder="Ingrese apellidos ">
		{!! $errors->first('apellidos', '<span class=error>:message</span>') !!}
	  </div>
		
	  <div class="col-4">
			<label class="my-1 mr-2" for="jefe">
				Elegir Asesor 
					<select class="custom-select " id="jefe" name="jefe">

						@if($tipo == 'edit')
						@foreach ($jefes as $jefe)
								<option 
										@if( $jefe->id == $colaborador->jefe)
											selected="selected" 
										@endif	
										value="{{ $jefe->id }}" >
										{{$jefe->nombre}} {{$jefe->departamento}}
									</option>
									{!! $errors->first('jefes', '<span class=error>:message</span>') !!}
									@endforeach
						@elseif($tipo == 'crear')
									@foreach ($jefes as $jefe)
										<option 	
												value="{{ $jefe->id }}" >
												{{$jefe->nombre}} {{$jefe->departamento}}
												
										</option>
										{!! $errors->first('jefe', '<span class=error>:message</span>') !!}
										@endforeach
						@endif
						
						
					</select>
			</label>
			
	  </div>

</div>
<br>

<div class="row fuente">
		<div class="col-4">
				<label for="horast" >Horas totales</label>
			<input class="form-control" type="text" name="horast" value="{{$colaborador->horast }}" placeholder="Ingrese horas totales ">
			{!! $errors->first('horast', '<span class=error>:message</span>') !!}
			</div>

	<div class="col-4">
	  	<label for="email">Email</label>
	    <input class="form-control" type="text" name="email" value="{{$colaborador->email }}" placeholder="Ingrese email del alumno">
		{!! $errors->first('email', '<span class=error>:message</span>') !!}
	</div>
	

	<div class="col-4">
		<label for="telfono">telefono</label>
	<input class="form-control" type="text" name="telefono" value="{{$colaborador->telefono }}" placeholder="Telefono ">
	{!! $errors->first('telefono', '<span class=error>:message</span>') !!}
	</div>	
</div>
<br>
<div class="row fuente">
		<div class="col-4">
			<label for="foto">Elegir foto</label>
		<input class="form-control" type="file" name="img" value="{{$colaborador->img }}" placeholder="Elegir foto ">
		{!! $errors->first('img', '<span class=error>:message</span>') !!}
		</div>
</div>	
<br>
	<br>