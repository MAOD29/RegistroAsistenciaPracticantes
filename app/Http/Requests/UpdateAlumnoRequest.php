<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
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
            'nombre' => 'required|max:15',
            'apellidos' => 'required|max:15',
            'jefe' => 'required|max:15',
            'telefono' => 'required|max:10',
            'horast' => 'required|max:4',
            'img' => 'required',
            'email' => 'required|email|unique:colaboradors,email,'.$this->route('colaborador'),
        ];
    }
}