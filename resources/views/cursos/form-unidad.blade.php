{!! csrf_field()  !!}

	<div class="row fuente">
		 
		   <input type="hidden" name="id_curso" value="{{ $id->id }}" readonly>
		   
		  <div class="col-4">
		  	<label >Nombre curso</label>
		  	<input class="form-control" type="text"  value="{{ $id->name }}" readonly>
			{!! $errors->first('id_curso', '<span class=error>:message</span>') !!}
		  </div>
		  <div class="col-4">
		  	<label for="name">Nombre Unidad</label>
		  	<input class="form-control" type="text" name="name" value="" placeholder="">
			{!! $errors->first('name', '<span class=error>:message</span>') !!}
		  </div>
	</div>

	<br>