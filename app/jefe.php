<?php

namespace App;
use App\colaborador;

use Illuminate\Database\Eloquent\Model;

class jefe extends Model
{
    //
    protected $fillable = [
        'nombre', 'apellidos','departamento',
    ];
    
    public function colaborador()

    {
         return $this->belongsTo(colaborador::class);
        // return $this->hasMany(Asistencia::class,'id_colaborador','id');
    }
    
   

    
}
