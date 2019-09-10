<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarRut;

class UsuariosEditRequest extends FormRequest
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
            'nombre_completo' => ['required'],
            'rut' => ['required', new ValidarRut],
            'direccion' => ['between:1,100'],
            'telefono' => ['between:8,12']
          ];
    }
    public function messages(){
        return [
          'nombre_completo.required' => 'Ingrese nombre completo',
          'rut.required' => 'Ingrese su rut',
          'direccion.between' => 'Campo Direccion un Minimo de 1 y un Maximo 100 caracteres',
          'telefono.between' => 'Campo telefono tiene un Minimo de 8 y un Maximo 12 caracteres'
        ];
      }
}
