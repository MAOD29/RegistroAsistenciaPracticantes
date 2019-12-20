{!! csrf_field()  !!}
	<div class="row fuente">
			
			<input type="hidden" name="id_tema" value="{{ $id->id }}">
			<div class="col-4">
		  	<label for="id_curso">Nombre de curso</label>
		  	<input class="form-control" type="text"  value="{{ $curso->curso->name }}" readonly>
		  </div>
		   <div class="col-4">
		  	<label for="id_unidad">Nombre de unidad</label>
		  	<input class="form-control" type="text"  value="{{ $curso->name }}" readonly>
		  </div>
		  <div class="col-4">
		  	<label for="id_tema">Nombre de tema</label>
		  	<input class="form-control" type="text"  value="{{ $id->nombre  }}" readonly>
		  </div>
	</div>	
	<div class="row fuente">
		<div class="col-4">
		  	<label for="texto">Texto de la pregunta</label>
		  	<textarea name="texto" cols="30" rows="10" class="texarea1" >{{ $text->texto }}</textarea>
		</div>
	</div>  
	
	<br>