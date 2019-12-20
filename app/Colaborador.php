<?php

namespace App;

use App\User;
use App\Asistencia;
use App\incidencia;
use App\Jefe;



use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    //
    protected $fillable = [
        'codigo', 'nombre', 'apellidos','jefe','horast','email','horasa','faltas','img','departamento'
        ,'telefono'
    ];

    public $timestamps = false;

    public function asistencias()

    {
         return $this->belongsTo(Asistencia::class);
        // return $this->hasMany(Asistencia::class,'id_colaborador','id');
    }
    
    public function incidencia()

    {
         return $this->belongsTo(incidencia::class);
        // return $this->hasMany(Asistencia::class,'id_colaborador','id');
    }

    public function depa()

    {
        
         return $this->hasMany(Jefe::class,'id','jefe');
    }

   

    
}
