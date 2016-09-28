<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
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
            'usuario'=>'required|max:50',
			'clave'=>'required|max:200'
        ];
    }
	
	public function messages()
	{
		return [
			'usuario.required'	=> 'Por favor ingrese el usuario.',
			'usuario.max'		=> 'Usuario: permitido máximo 50 caracteres.',
			'clave.required'	=> 'Por favor ingrese la contraseña.',
			'clave.max'			=> 'Contraseña: permitido máximo 200 caracteres.'
		];
	}
}
