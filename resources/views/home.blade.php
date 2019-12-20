@extends('layouts.snavbar')
@section('content')
    
    @if(session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif
    
    <!-- Hoja introductoria al sistema -->

    <h1>Datos Generales Del Sistema</h1>
    <div class="row">
      <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
            <i class="far fa-address-book fa-7x"></i>
            <div class="card-body">
              <h5 class="card-title">Practicantes</h5>
              <p class="card-text">Total de colaboradores {{$c}}.</p>
              <a href="{{ route('colaborador.index' )}}" class="btn btn-primary">Ir</a>
            </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="card" style="width: 18rem;">
              <i class="fas fa-file-excel  fa-7x"></i>
              <div class="card-body">
                <h5 class="card-title">Incidencias</h5>
                <p class="card-text">Numero de incidencias: {{$i}}.</p>
                <a href="{{ route('incidencias.index' )}}" class="btn btn-primary">Ir</a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <i class="fas fa-clipboard-list fa-7x"></i>
                <div class="card-body">
                    
                  <h5 class="card-title">Asistencias</h5>
                  <br><br>
                  <a href="{{ route('asistencias.index' )}}" class="btn btn-primary">Ir</a>
                </div>
              </div>
          </div>
    </div>
      
    

    


    

@stop
<!--
<div id="piechart" style="width: 900px; height: 500px;"></div>
<script type="text/javascript" src="/js/grafica.js"></script>

<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['materias', 'cantidad'],
           
              ['Colaboradores', {{ '1'}}],
              ['Incidencias', {{ '3'}}],
              ['contraloria', '1'],

        ]);
        var options = {
          title: 'Listado de colaboradores'
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="/js/grafica.js"></script>
