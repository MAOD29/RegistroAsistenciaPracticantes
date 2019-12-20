<!DOCTYPE html>
<html lang="en">
<head>
@if ($colaborador && $mensaje)    
<meta charset="UTF-8" http-equiv="refresh" content="6;{{route('checar')}}">
@else
<meta charset="UTF-8">
@endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checador</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Estos son los estiloos enstan en public/css modificalos ahi-->
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet">
  
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
 
</head>

<body >
        <li class="active list-unstyled components">
                <a href="/" ><i class="fas fa-home fa-5x"></i></a>
         </li>
    <!--- arreglar esta vista para que desaparesca -->
    <div class="">
        <div class="card mb-3 info container" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if ($colaborador && $mensaje)
                        <img src="{{ asset('imagen/'.$colaborador->img) }}" class="card-img imagen" >
                        @else  
                            
                        @endif  
                        </div>
                    <div class="col-md-8">
                    <div class="card-body">
                     @if ($colaborador && $mensaje)
                        <p class="card-text alert alert-success">{{$colaborador->nombre }}  {{$colaborador->apellidos}} </p>
                        <p class="card-text alert alert-success">{{$colaborador->depa->pluck('departamento')->implode(' - ')}}</p>                     
                        <p class="card-text alert alert-success"><small class="text-muted">{{$mensaje}} </small></p>        
                     @else
                        <p class="card-text alert alert-success"> -------------------------</p>
                        <p class="card-text alert alert-success">--------------------------</p>                     
                        <p class="card-text alert alert-success">--------------------------</p>   
                     @endif   
                    </div> 
               </div>
            </div>
        </div>
    </div>
        <div class="container centrar ">  
                   
                <label  id="date" ></label>
                <br>
                <span id="liveclock"></span>
                <br>
                <form method="POST" action="{{ route('asistencias.store' )}}" autocomplete="off" >
                    {!! csrf_field()  !!}
                    <input class= type="text" name="id_colaborador">
                    <br>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </form>
            
        </div>

        <script language="JavaScript" type="text/javascript">
            n =  new Date();
            //Año
            y = n.getFullYear();
            //Mes
            m = n.getMonth() + 1;
            //Día
            d = n.getDate();
            //Lo ordenas a gusto.
            document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
        </script>

        <script language="JavaScript" type="text/javascript">
         function show5(){
             if (!document.layers&&!document.all&&!document.getElementById)
             return
              var Digital=new Date()
              var hours=Digital.getHours()
              var minutes=Digital.getMinutes()
              var seconds=Digital.getSeconds()
             var dn="PM"
             if (hours<12)
             dn="AM"
             if (hours>12)
             hours=hours-12
             if (hours==0)
             hours=12
              if (minutes<=9)
              minutes="0"+minutes
              if (seconds<=9)
              seconds="0"+seconds
             //change font size here to your desire
             myclock="<font size='5' face='Arial' ><b><font size='1'>:</font>"+hours+":"+minutes+":"
              +seconds+" "+dn+"</b></font>"
             if (document.layers){
             document.layers.liveclock.document.write(myclock)
             document.layers.liveclock.document.close()
             }
             else if (document.all)
             liveclock.innerHTML=myclock
             else if (document.getElementById)
             document.getElementById("liveclock").innerHTML=myclock
             setTimeout("show5()",1000)
              }
             window.onload=show5
              //-->
          </script>    
    
    
    
    
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>