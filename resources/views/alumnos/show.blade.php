@extends('layouts.snavbar')

@section('content')

<div class="row">
		
    <div class="col-4" >
        <img src="{{ asset('imagen/'.$colaborador->img) }}" class="imagenc"  >

        
    </div>
    <div class="container col-8">
            <a class="btn btn-info " href="{{ route('tarjeta/', $colaborador->id )}}">Ver tajeta</a>
            <a class="btn btn-info " href="{{ route('colaborador.edit', $colaborador->id )}}">Editar</a>
            <form style="display: inline;" method="POST" action="{{ route('colaborador.destroy',$colaborador->id) }}">
                    {!! csrf_field()  !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger " type="submit">Eliminar</button>
                </form> 
        </div>
</div>
    
 
<table class="table espacio " >
		
		<thead>
			<tr>
                <th>Codigo</th>
                <td>{{ $colaborador->codigo }}</td>
                <th>Nombre</th>
                <td>{{ $colaborador->nombre }}</td>
                <th>Apellidos</th>
                <td>{{ $colaborador->apellidos }}</td>
                
				

			</tr> 
        </thead>
        <br>
		<tbody>
			<tr>
                    <th>Asesor</th>
                    <td>{{ $colaborador->depa->pluck('nombre')->implode(' - ') }} {{ $colaborador->depa->pluck('apellidos')->implode(' - ') }}</td>
            
                    <th>Departamento</th>
                    <td>{{ $colaborador->depa->pluck('departamento')->implode(' - ') }}</td>
			
                    <th>Horas totales</th>
                    <td>{{ $colaborador->horast }}</td>
                   
                   
            </tr>
            
            <tr>
                    <th>Horas actuales</th>
                    <td>{{ $colaborador->horasa }}</td>
                <th>Email</th>
				<td>{{ $colaborador->email }}</td>
                <th>Telefono</th>
                <td>75551052120</td>
                
        </tr>
			
		</tbody>
	</table>
   

@stop
