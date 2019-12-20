<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use \Datetime;
use App\Colaborador;
use App\Asistencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Policies\Userpolicy;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        Cache::flush();
        
        $type = true;
        if ($request->search == '' and $request->fecha_inicial and $request->fecha_final) {
            $key = 'asistencias.page' . request('page', 1) . request('search','');
            $asistencias = Cache::rememberForever($key, function() use($request){
                $date_inicial = new Carbon($request->fecha_inicial." 00:00:00");
                $date_final = new Carbon($request->fecha_final." 23:59:59");
                return $asistencias = Asistencia::where('fecha','>=',$date_inicial)
                                                ->where('fecha','<=',$date_final)
                                                ->orderBy('fecha', request('sorted','ASC'))->paginate(5);
            });
            return view('asistencias.index',compact('asistencias','type'));
        }elseif($request->search == '' ){

            $asistencias = Asistencia::where('id',$request->search);
            $type = false;
            return view('asistencias.index',compact('asistencias','type'));
        
        }
        
        
        $key = 'asistencias.page' . request('page', 1) . request('search','');
        $asistencias = Cache::rememberForever($key, function() use($request){
        $date_inicial = new Carbon($request->fecha_inicial." 00:00:00");
        $date_final = new Carbon($request->fecha_final." 23:59:59");
        return $asistencias = Asistencia::where('id_colaborador','like','%'.$request->search.'%')
                                        ->where('fecha','>=',$date_inicial)
                                        ->where('fecha','<=',$date_final)
                                        ->orderBy('fecha', request('sorted','ASC'))->paginate(5);
    });
    
        
    return view('asistencias.index',compact('asistencias','type'));
        
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = "Bienvenido";
        $colaborador = Colaborador::where('codigo',$request->id_colaborador)->first();
        $date = new Carbon();
        $fecha = $date->format('Y-m-d');
        $salida = Asistencia::where('id_colaborador',$request->id_colaborador)->where('fecha',$fecha)->first();
        
        if (!$colaborador) {
            $mensaje = "Colaborador no registrado";
            $colaborador = False;
            return view('checador',compact('colaborador','mensaje'));  
            
        }
        
        if($salida){
            $mensaje = "Que descanses buen trabajo";
            $asistencia = Asistencia::findOrFail($salida->id);
            
            if($salida->horast){
                //metodo para sumar las horas actuales
                $now = Carbon::now(); 
                $hora_salida = Carbon::parse($asistencia->horasa);

                $diff = $now->diffInHours($asistencia->hora_salida);  
                $horas_totales = $colaborador->horasa + $diff;
                $colaborador->horasa = $horas_totales;
                
                $colaborador->save();
            }
            
            //terminar de redondear
            $hora_entrada = Carbon::parse($asistencia->hora_entrada); 
            $now = Carbon::now(); 
            $diff = $now->diffInHours($hora_entrada); 
            $asistencia->hora_salida = $now;
            $asistencia->horast = $diff;
            $asistencia->save();

            $colaborador->horasa = $diff;
            $colaborador->save();
            
            return view('checador',compact('colaborador','mensaje'));   
        }                   
        //metodo para registro de hora, recordar los espacios cuentas a la hora de realziar un registro checar bien el nombre de las columnas
        Asistencia::create([
            'fecha' => $date,
            'hora_entrada' => $date,
            'id_colaborador' => $request->id_colaborador,
        ]);
        return view('checador',compact('colaborador','mensaje'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checador(){
        $colaborador = FALSE;
        $mensaje = FALSE;
        return view('checador',compact('colaborador','mensaje'));
    }

}
