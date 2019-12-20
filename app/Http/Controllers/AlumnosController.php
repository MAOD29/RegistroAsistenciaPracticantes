<?php

namespace App\Http\Controllers;

use App\Colaborador;
use App\Asistencia;
use App\incidencia;

use App\Jefe;
use App\User;

use Carbon\Carbon;
use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Policies\Userpolicy;

use Illuminate\Http\Request;

class AlumnosController extends Controller
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
        //Cache::flush();
        $key = 'alumnos.page' . request('page', 1) . request('search','');
        $colaboradores = Cache::rememberForever($key, function() use($request){
            return $colaboradores = Colaborador::where('nombre','like','%'.$request->search.'%')
                           ->orWhere('apellidos','like','%'.$request->search.'%')
                           ->orWhere('codigo','like','%'.$request->search.'%')
                           ->orWhere('jefe', 'like','%'.$request->search.'%')->orderBy('nombre', request('sorted','ASC'))->paginate(8);
        });
        return view('alumnos.index',compact('colaboradores'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipo = 'crear';
        $user = Auth::user();
        $this->authorize('before',$user);
        $jefes = Jefe::all();
        return view('alumnos.create',compact('jefes','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        //agregar departamento aqui
        $user = Auth::user();
        $this->authorize('before',$user);
        $departamento = Jefe::FindOrFail($request->jefe);
        //guardar imagen
        $file = $request->file('img');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $type = false;
        $colaborador = Colaborador::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'jefe' => $request->jefe,
            'departamento' => $departamento->departamento,
            'telefono' => $request->telefono,
            'horast' => $request->horast,
            'email' => $request->email,
            'horasa' => "0",
            'faltas' => "0",
            'img' => $nombre,

        ]);

        Cache::flush();
        return view ('tarjeta',compact('colaborador','type'));

        //return redirect()->route('colaborador.index')->with('info','Colaborador creado');
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
        $colaborador =Colaborador::findOrFail($id);
        $public_path = public_path();
        $url = $public_path.'/imagen/'.$colaborador->img;
        $type = false;
        if (\Storage::exists($colaborador->img))
        {
        
        return view ('alumnos.show',compact('colaborador','type'));
        }
     

        return redirect()->route('colaborador.index')->with('info','Imagen de practicante no existente actualizar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Auth::user();
        $tipo = "edit";
        $this->authorize('before',$user);

        $colaborador = Colaborador::findOrFail($id);
        $jefes = Jefe::all();
        return view('alumnos.edit',compact('colaborador','jefes','tipo'));


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateAlumnoRequest $request, $id)
    {
        // verificar si esta autenticado
        $user = Auth::user();
        $this->authorize('before',$user);
        //actualizar departamento
        $departamento = Jefe::FindOrFail($request->jefe);
        //actualizar imagen
        $file = $request->file('img');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $colaborador = Colaborador::findOrFail($id);
        $colaborador->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'jefe' => $request->jefe,
            'departamento' => $departamento->departamento,
            'telefono' => $request->telefono,
            'horast' => $request->horast,
            'email' => $request->email,
            'img' => $nombre,

        ]);

        Cache::flush();

       return redirect()->route('colaborador.index')->with('info','practicante actualizado');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hacer un try y cath
        $user = Auth::user();
        $this->authorize('before',$user);
        $colaborador = Colaborador::findOrFail($id);
        $incidencias = incidencia::where('codigo_colaborador',$colaborador->codigo)->get();
        $asistencias = Asistencia::where('id_colaborador',$colaborador->codigo)->get();

        if(!$incidencias->isEmpty())
        {
            foreach($incidencias as $key){
                $key->delete();
            }
        }
        if($asistencias->isEmpty()){
            foreach($asistencias as $key){
                $key->delete();
            }
        }
        
        $colaborador->delete();
        Cache::flush();
        

        return back()->with('info','Practicante eliminado');
    }

    public function tarjeta($id){

        $colaborador =Colaborador::findOrFail($id);
        $public_path = public_path();
        $url = $public_path.'/imagen/'.$colaborador->img;
        $type = false;
        if (\Storage::exists($colaborador->img))
        {
        
        return view ('tarjeta',compact('colaborador','type'));
        }
     

        return redirect()->route('colaborador.index')->with('info','Imagen de practicante no existente actualizar');
    }

    public function pdftarjeta($id){

        $colaborador =Colaborador::findOrFail($id);
        $public_path = public_path();
        $url = $public_path.'/imagen/'.$colaborador->img;
        $type = true;
        if (\Storage::exists($colaborador->img))
        {
        
            $pdf = \PDF::loadView('tarjetaform', compact('colaborador','type'));
            return $pdf->download('tarjetas.pdf');
        }
     

        return redirect()->route('colaborador.index')->with('info','Imagen de practicante no existente actualizar');
        
     }

   }
 