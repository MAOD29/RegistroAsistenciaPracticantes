<?php

namespace App\Http\Controllers;


use App\incidencia;
use App\Colaborador;




use Illuminate\Http\Request;

class menu extends Controller
{
    //
	
    public function bienvenida()
    {

        //return \Response::json(User::all());
        $i = incidencia::count();
        $c = Colaborador::count();

        return view('home',compact('i','c'));
    }

    

}
