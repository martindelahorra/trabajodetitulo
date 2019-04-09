<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRut;
class UsuarioRequest extends FormRequest
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
            'username' => ['required','unique:usuarios,username'],
            'nombre_completo' => ['required'],
            'password' => ['required', 'confirmed'],
            'rut' => ['required', new ValidarRut]
          ];
    }
    public function messages(){
        return [
          'username.required' => 'Ingrese nombre de usuario',
          'username.unique' => 'Nombre de usuario no disponible',
          'nombre_completo.required' => 'Ingrese nombre completo',
          'password.required' => 'Ingrese su contraseña',
          'password.confirmed' => 'Las contraseñas no coinciden',
          'rut.required' => 'Ingrese su rut'
        ];
      }
}
