@extends('layouts.snavbar')
@section('content')
	@if(session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif

<form method="POST" action="{{ route('incidencias.update', $incidencias->id) }}" autocomplete="off">
        {!! method_field('PUT') !!}
        @include('incidencias.form')
       

</form>
@endsection