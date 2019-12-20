
    @if($type)
  
        {!! csrf_field()  !!}
    <div class="row fuente">
        <div class="col-4">
            <label for="codigo">Código</label>
            <input type="text" readonly class="form-control-plaintext" name="codigo_colaborador" value="{{ $colaborador->codigo}}">
            {!! $errors->first('codigo', '<span class=error>:message</span>') !!}
        </div>
        <div class="col-4">
            <label for="nombre">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" value="{{ $colaborador->nombre}}">
        </div>
    
        <div class="col-4">
            <label for="paterno" >Apellidos</label>
            <input type="text" readonly class="form-control-plaintext" value="{{ $colaborador->apellidos}}">
        </div>        
    </div>
    <br>
    <div class="row fuente">
       
        
        <div class="col-4">
            <label for="paterno" >Departamneto</label>
            <input type="text" readonly class="form-control-plaintext" value="{{ $colaborador->departamento}}">
          
        </div>
        <div class="col-4">
            <label for="fecha">Fecha</label>
        <input class="form-control" type="date" name="fecha" value="{{$incidencias->fecha}}">
                {!! $errors->first('fecha', '<span class=error>:message</span>') !!}
        </div>
        <div class="col-4">
                <label for="tipo">Tipo de incidencia</label>
                <br>
                @if($incidencias->tipo == 'falta')
                <div class="form-check form-check-inline negro">
                    <input class="form-check-input " type="radio" name="tipo" checked value="falta">
                    <label class="form-check-label" for="inlineCheckbox">Falta</label>
                  </div>
                  <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo" value="retardo">
                        <label class="form-check-label " for="inlineCheckbox">Retardo</label>
                      </div> 
                      <div class="form-check form-check-inline negro">
                            <input class="form-check-input " type="radio" name="tipo"  value="reporte">
                            <label class="form-check-label " for="inlineCheckbox">Reporte</label>
                      </div>   
                @elseif($incidencias->tipo == 'retardo')  
                <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo"  value="falta">
                        <label class="form-check-label" for="inlineCheckbox">Falta</label>
                      </div>
                  <div class="form-check form-check-inline negro">
                    <input class="form-check-input " type="radio" name="tipo" checked value="retardo">
                    <label class="form-check-label " for="inlineCheckbox">Retardo</label>
                  </div>
                  <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo"  value="reporte">
                        <label class="form-check-label " for="inlineCheckbox">Reporte</label>
                  </div>  
                @elseif($incidencias->tipo == 'reporte')  
                <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo"  value="falta">
                        <label class="form-check-label" for="inlineCheckbox">Falta</label>
                      </div>
                      <div class="form-check form-check-inline negro">
                            <input class="form-check-input " type="radio" name="tipo" value="retardo">
                            <label class="form-check-label " for="inlineCheckbox">Retardo</label>
                          </div> 
                  <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo" checked value="reporte">
                        <label class="form-check-label " for="inlineCheckbox">Reporte</label>
                  </div>
                  @else  
                  <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo"  value="falta">
                        <label class="form-check-label" for="inlineCheckbox">Falta</label>
                      </div>
                      <div class="form-check form-check-inline negro">
                            <input class="form-check-input " type="radio" name="tipo" value="retardo">
                            <label class="form-check-label " for="inlineCheckbox">Retardo</label>
                          </div> 
                  <div class="form-check form-check-inline negro">
                        <input class="form-check-input " type="radio" name="tipo" value="reporte">
                        <label class="form-check-label " for="inlineCheckbox">Reporte</label>
                  </div>
                @endif  
            </div>      
    </div>  
    <br>
    <div class="row fuente">
        <div class="col-6">
                <label for="observaciones" >Observaciones</label>
                <textarea class="form-control" id="descripcion" name="observaciones"  rows="4">{{ $incidencias->observaciones}}</textarea>
              
            </div>
    </div>  
    
    <input class="btn boton" type="submit" value="Guardar">
    @endif
  

