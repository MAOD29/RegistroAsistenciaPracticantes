@extends('layouts.snavbar')
@section('content')
<h1>Curso: {{ $curso->name }}</h1>

<br>


@foreach($curso->unidades as $uni)
	<ul>
		<li>{{ $uni->name }}</li>
		<br>
		@foreach($curso->temas as $tema )
			@if($uni->id == $tema->id_unidad )
				<ul>
					<li>
						<a  class="li1" href="{{ route('listado', $tema->id )}}">{{ $tema->nombre }}
						@if($activar)
							</a><a class="btn btn-info  btn-sm" href="{{ route('activacion.edit',$tema->id)}}">Elegir fecha de activacion</a>
						@elseif($tema->inicio !="")

							<form style="display: inline;" method="POST" action="{{ route('activacion.update',$tema->id )}}" autocomplete="off" >
								{!! csrf_field()  !!}
								{!! method_field('PUT') !!}
								<input type="hidden" name="fecha_inicial" value="">		
								<input type="hidden" name="activar" value="no">		
								<input type="hidden" name="fecha_final" value="">		
								
								<input class="btn btn-danger btn-sm" type="submit" value="Eliminar activacion">
							</form>
						@endif
					</li>
				</ul>	
			@endif	
		@endforeach
		<br>
	</ul>
@endforeach


@stop