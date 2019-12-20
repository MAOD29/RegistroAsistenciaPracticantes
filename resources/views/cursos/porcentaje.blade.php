@extends('layouts.snavbar')
@section('content')

<h1>Curso: {{ $curso->name }}</h1>

<br>

@foreach($curso->unidades as $uni)
	<ul>
		<li>{{ $uni->name  }}

			<form style="display: inline;" method="POST" action="{{ route('cursos.update', $uni->id) }}" autocomplete="off">
			
				{!! csrf_field()  !!}
				{!! method_field('PUT') !!}
				 <input type="hidden" name="tipo" value="unidad" readonly>
				<input type="text" value=" {{ $uni->porcentaje }}" name="porcentaje">
				<input class="btn btn-success btn-sm" type="submit" value="Asignar">
			</form>
		</li>
		<br>
		@foreach($curso->temas as $tema )
			@if($uni->id == $tema->id_unidad )
				<ul>
					<li>{{ $tema->nombre }} 
						<form style="display: inline;" method="POST" action="{{ route('cursos.update', $tema->id) }}" autocomplete="off">
			
						{!! csrf_field()  !!}
						{!! method_field('PUT') !!}
						 <input type="hidden" name="tipo" value="tema" readonly>
						<input type="text" value=" {{ $tema->porcentaje }}" name="porcentaje">
						<input class="btn btn-success btn-sm" type="submit" value="Asignar">
			</form>
					</li>
				</ul>	
			@endif	
		@endforeach
		<br>
	</ul>
@endforeach
@stop