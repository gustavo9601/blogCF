<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'title' => 'required|min:5|max:10',
            'content' => 'required|min:5|max:50'
        ];
    }

    //Funcion que sobrescribe los mensajes de respuesta
    public function messages()
    {
        return [
          'title.required' => 'Titulo requerido',
          'title.min' => 'Titulo debe ser mayor  a 5 letras',
        ];
    }
}
