<?php

namespace App;
use App\Colaborador;
use App\Jefe;


use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    // 
    protected $fillable = [
        'id_colaborador','hora_entrada','retardo','fecha'
    ];

    public $timestamps = false;

    public function colaborador()

    {
         //return $this->belongsTo(Alumno::class, 'id_grupo', 'id');
         return $this->hasMany(Colaborador::class,'codigo','id_colaborador');
    }
    

   /* public function colaborador()

    {
         return $this->belongsTo(Asistencia::class, 'id_colaborador', 'id');
         //return $this->hasMany(Grupo::class,'id_curso');
    }*/

    
}
