<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfesorRequest extends FormRequest
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
            'paterno' => 'required|max:15',
            'materno' => 'required|max:15',
            'cargo' => 'required|max:20',
            'email' => 'email|required|unique:profesors,email,'.$this->route('profesor'),
            
        ];
    }
}
