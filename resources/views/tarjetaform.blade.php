@if($type)
<!DOCTYPE html>
<html >
<head>
      <link href="{{ asset('css/style3.css') }}" rel="stylesheet"> 
</head>
<body>
        <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                        <img src="{{ asset('imagen/'.$colaborador->img) }}" class="card-img imagent " >
                  </div>
                  <div class="col-md-8">
                    <div class="card-body let">
                    <h5 class="card-title">{!!DNS1D::getBarcodeHTML($colaborador->codigo,'C128A') !!}</h5>
                    <p class="card-text">Nombre: {{$colaborador->nombre }} {{$colaborador->apellidos}} </p>
                    <p class="card-text">Departamento:  {{$colaborador->departamento}}</p>
                    <p class="card-text"><small class="text-muted">Email: {{$colaborador->email }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
      
</body>
</html>
@else 
<div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                        <img src="{{ asset('imagen/'.$colaborador->img) }}" class="card-img " >
                  </div>
                  <div class="col-md-8">
                    <div class="card-body let">
                    <h5 class="card-title">{!!DNS1D::getBarcodeHTML($colaborador->codigo,'C128A') !!}</h5>
                    <p class="card-text">Nombre: {{$colaborador->nombre }} {{$colaborador->apellidos}} </p>
                    <p class="card-text">Departamento:  {{$colaborador->departamento}}</p>
                    <p class="card-text"><small class="text-muted">Email: {{$colaborador->email }}</small></p>
                    </div>
                  </div>
                </div>
              </div>


@endif
