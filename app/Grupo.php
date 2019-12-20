<?php

namespace App;
use App\Alumno;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $fillable = [
        'semestre', 'nombre','year'
    ];

    public function alumno()

    {
         //return $this->belongsTo(Alumno::class, 'id_grupo', 'id');
         return $this->hasMany(Alumno::class,'id_grupo','id');
    }
    public function maestros(){
        return $this->belongsToMany(Profesor::class,'assigned_grupos');

    } 
  
}
