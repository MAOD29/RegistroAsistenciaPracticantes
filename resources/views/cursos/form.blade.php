{!! csrf_field()  !!}

 <div class="row fuente">
	   <input type="hidden" name="estado" value="no" readonly>

	  <div class="col-4">
	  	<label for="name">Nombre</label>
	  	<input class="form-control" type="text" name="name" value="{{$curso->name }}" placeholder="Ingrese nombre del curso">
		{!! $errors->first('name', '<span class=error>:message</span>') !!}
	  </div>


	  <div class="col-4">
		<label class="my-1 mr-2" for="inlineFormCustomSelectPref">
			Elegir Grupo
			  <select class="custom-select " id="inlineFormCustomSelectPref " name="id_grupo">
				    @foreach ($grupos as $grupo )
	          			<option 

		          					
	          			 		value="{{ $grupo->id }}" >
	          					{{$grupo->semestre }} {{ $grupo->nombre }} {{ $grupo->year }}
	          			</option>
				    @endforeach
				    {!! $errors->first('id_grupo', '<span class=error>:message</span>') !!}
			  </select>
		</label>
	  </div>

</div>
<br>


