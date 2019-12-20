<?php

namespace App\Http\Controllers;

use App\Tema;
use App\Curso;
use App\Unidad;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
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
        //
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
        //
        $tema = Tema::findOrFail($id);
        //dd($curso->unidad->temas);
        return view ('cursos.activar', compact('tema'));
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
        //poner fecha de activacion del tema
        $tema = Tema::findOrFail($id);
        $unidad = Unidad::findOrFail($tema->id_unidad);
        $curso = Curso::findOrFail($unidad->id_curso);
        $date_inicial = new Carbon($request->fecha_inicial." 00:00:00");
        $date_final = new Carbon($request->fecha_final." 23:59:59");
        

        if($request->activar == "no"){
            $curso->estado = "no";
            $curso->save();
            
            $tema->inicio = $request->fecha_inicial;
            $tema->final = $request->fecha_final;
            $tema->save();

            return redirect()->route('cursos.index')->with('info','Tema desactivado');
        }
        if($request->activar == "si"){
            $curso->estado = "si";
            $curso->save();
            $tema->inicio = $date_inicial;
            $tema->final = $date_final;
            $tema->save();
            return redirect()->route('cursos.index')->with('info','Tema activado');
        }
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
}
