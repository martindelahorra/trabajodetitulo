<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'direccion' =>['required'],
            'telefono' => ['required','min:6', 'max:13'],
            'descripcion'=>['max:100']
        ];
    }
    public function messages()
    {
        return[
            'nombre_completo.required' => 'Ingrese Su Nombre Completo',
            'direccion.required' => 'Ingrese la direccion de envio',
            'telefono.required' => 'Ingrese el telefono de contacto',
            'telefono.numeric' => 'El telefono deben ser numeros',
            'telefono.min' => 'El telefono debe tener minimo 7 digitos',
            'telefono.max' => 'El telefono debe tener maximo 13 digitos',
            'descripcion.max' => 'Descripcion muy larga, maximo 100 caracteres'

           

        ];
    }
}
