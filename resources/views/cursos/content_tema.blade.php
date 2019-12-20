@extends('layouts.snavbar')
@section('content')

@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
<h1>{{ $tema->nombre  }}</h1>
<br>

<h3>Texto del tema</h3>
<br>

	<p>{{ $tema->texto->texto }}
		<a class="btn btn-info  btn-sm" href="{{ route('textos.edit', $tema->texto->id )}}">Editar</a>
	</p>

<h3>Preguntas del tema</h3>

@foreach($tema->preguntas as $pregunta )
			<ul>
				<li>
					<p>{{ $pregunta->pregunta }}
					<a class="btn btn-info  btn-sm" href="{{ route('pregunta.edit', $pregunta->id )}}">Editar</a>
					<a class="btn btn-danger  btn-sm" href="{{ route('pregunta.destroy', $pregunta->id )}}">Eliminar</a>
					</p>

				</li>
			</ul>	
		
	@endforeach

	

@stop