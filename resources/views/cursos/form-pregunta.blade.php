{!! csrf_field()  !!}
	<input type="hidden" name="id_tema" value="{{ $id_tema->id }}">
	<div class="row fuente">
		   <div class="col-4">
		  	<label for="id_tema">Nombre de tema</label>
		  	<input class="form-control" type="text"  value="{{ $id_tema->nombre }}" readonly>
			
		  </div>
		  <div class="col-4">
		  	<label for="pregunta">Pregunta*</label>
		  	<input class="form-control" type="text" name="pregunta" value="{{ $pregunta->pregunta }}" placeholder="">
			{!! $errors->first('pregunta', '<span class=error>:message</span>') !!}
		  </div>
		  <div class="col-4">
		  	<label for="correcta">Correcta*</label>
		  	<input class="form-control" type="text" name="correcta" value="{{ $pregunta->correcta }}"  placeholder="">
			{!! $errors->first('correcta', '<span class=error>:message</span>') !!}
		  </div>

	</div>
	<br>
	<div class="row fuente">
		   <div class="col-4">
		  	<label for="incorrecta">InCorrecta 1*</label>
		  	<input class="form-control" type="text" name="incorrecta" value="{{ $pregunta->incorrecta }}"   placeholder="">
			{!! $errors->first('incorrecta', '<span class=error>:message</span>') !!}
		  </div>
		  <div class="col-4">
		  	<label for="incorrecta2">InCorrecta 2 </label>
		  	<input class="form-control" type="text" name="incorrecta2" value="{{ $pregunta->incorrecta2 }}"  placeholder="">
			{!! $errors->first('incorrecta2', '<span class=error>:message</span>') !!}
		  </div>
		  <div class="col-4">
		  	<label for="incorrecta3">InCorrecta 3 </label>
		  	<input class="form-control" type="text" name="incorrecta3" value="{{ $pregunta->incorrecta3 }}" >
			{!! $errors->first('incorrecta3', '<span class=error>:message</span>') !!}
		  </div>
		  
	</div>
	<br>
	<div class="row fuente">
		   <div class="col-4">
		  	<label for="incorrecta4">InCorrecta 4 </label>
		  	<input class="form-control" type="text" name="incorrecta4" value="{{ $pregunta->incorrecta4 }}">
			{!! $errors->first('incorrecta4', '<span class=error>:message</span>') !!}
		  </div>
		  <div class="col-4">
		  	<label for="incorrecta5">InCorrecta 5 </label>
		  	<input class="form-control" type="text" name="incorrecta5" value="{{ $pregunta->incorrecta5 }}">
			{!! $errors->first('incorrecta5', '<span class=error>:message</span>') !!}
		  </div>
		  
	</div>
	<br>
	<div class="row fuente">
		<div class="col-4">
		  	<div class="form-check-inline ">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="tipo" value="1">Normal
			  </label>
			</div>
			<div class="form-check-inline ">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="tipo" value="2">Rellenar
			  </label>
			</div>
			<div class="form-check-inline ">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="tipo" value="3">Verdadero o Falso
			  </label>
			</div>
			{!! $errors->first('tipo', '<span class=error>:message</span>') !!}
		</div>
	</div>
	

	<br>