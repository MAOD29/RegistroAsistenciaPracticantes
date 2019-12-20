<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incidencia extends Model
{
    //
    protected $fillable = [
        'codigo_colaborador', 'observaciones', 'tipo','fecha'
    ];
    public $timestamps = false;

    public function colaborador()

    {
         //return $this->belongsTo(Alumno::class, 'id_grupo', 'id');
         return $this->hasMany(Colaborador::class,'codigo','codigo_colaborador');
    }
    
}
