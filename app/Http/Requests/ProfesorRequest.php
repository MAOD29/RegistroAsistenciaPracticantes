<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /** 
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'clave' => 'required|max:10|unique:profesors,clave'.$this->route('profesor'),       
            'clave' => 'required|max:10|unique:alumnos,matricula'.$this->route('alumnos'),       
            'nombre' => 'required|max:15',
            'paterno' => 'required|max:15',
            'materno' => 'required|max:15',
            'cargo' => 'required|max:20',
            'email' => 'required|email|unique:users,email,'.$this->route('usuario'),
            
            
            
        ];
    }
}
