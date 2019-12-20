<?php

namespace App\Http\Controllers;

use App\incidencia;
use App\Colaborador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Policies\Userpolicy;

use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->middleware('roles:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //
         //Cache::flush();
         $key = 'incidencias.page' . request('page', 1) . request('search','');
         $incidencias = Cache::rememberForever($key, function() use($request){
             return $incidencias = incidencia::where('codigo_colaborador','like','%'.$request->search.'%')
                            ->orWhere('tipo','like','%'.$request->search.'%')
                            ->orderBy('tipo', request('sorted','ASC'))->paginate(8);
         });
        return view('incidencias.index',compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = Auth::user();
        $type = false;
      
        $this->authorize('before',$user);
        return view('incidencias.create',compact('type'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('before',$user);
       
        incidencia::create([
            'tipo' => $request->tipo,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones,
            'codigo_colaborador' => $request->codigo_colaborador,
            
        ]);
        Cache::flush();
        return redirect()->route('incidencias.index')->with('info','incidencia creada'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        $this->authorize('before',$user);
        $type = true;
        $incidencias = incidencia::findOrFail($id);
        $colaborador = Colaborador::where('codigo',$incidencias->codigo_colaborador)->first();

        return view('incidencias.edit',compact('incidencias','type','colaborador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $user = Auth::user();
        $this->authorize('before',$user);
        $incidencia = incidencia::findOrFail($id);
        $incidencia->update($request->except('id'));
        Cache::flush();
       return redirect()->route('incidencias.index')->with('info','incidencia actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hacer un try y cath
        $user = Auth::user();
        $this->authorize('before',$user);
        $incidencia = incidencia::findOrFail($id);
        $incidencia->delete();
        Cache::flush();

        return back()->with('info','Incidencia eliminada');
    }

    public function faltas(Request $request )
    {
        
      $type = true;
        if ($request->search == '' ) {
            $type = false;
            $colaborador = Colaborador::where('codigo',$request->search)->first();
            return view('incidencias.create',compact('colaborador','type'));
        }

        $colaborador = Colaborador::where('codigo',$request->search)->first();
        
        return view('incidencias.create',compact('colaborador','type'));
    }


}
