<?php

namespace App\Http\Controllers;

use App\jefe;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \Datetime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Policies\Userpolicy;


class JefeController extends Controller
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
    public function index(Request $request)
    {
        //
        $key = 'jefes.page' . request('page', 1) . request('search','');
        $jefes = Cache::rememberForever($key, function() use($request){
            return $jefess = Jefe::where('nombre','like','%'.$request->search.'%')
                           ->orWhere('apellidos','like','%'.$request->search.'%')
                           ->orWhere('id','like','%'.$request->search.'%')
                           ->orWhere('departamento', 'like','%'.$request->search.'%')->orderBy('id', request('sorted','ASC'))->paginate(5);
        });
            return view('jefes.index',compact('jefes'));
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
        $this->authorize('before',$user);
        return view('jefes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $this->authorize('before',$user);
        Jefe::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'departamento' => $request->departamento,
        ]);

        Cache::flush();
        return redirect()->route('jefe.index')->with('info','Asesor agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jefe =Jefe::findOrFail($id);
        return view ('jefes.show',compact('jefe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        $this->authorize('before',$user);

        $jefe = Jefe::findOrFail($id);
        //$grupos = Grupo::all();
        return view('jefes.edit',compact('jefe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $user = Auth::user();
        $this->authorize('before',$user);
        $jefe = Jefe::findOrFail($id);
        $jefe->update($request->except('id'));
        Cache::flush();

       return redirect()->route('jefe.index')->with('info','jefe actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //hacer un try y cath
        $user = Auth::user();
        $this->authorize('before',$user);
        $jefe = Jefe::findOrFail($id);
        $jefe->delete();
        Cache::flush();

        return back()->with('info','jefe eliminado');
    }
}
