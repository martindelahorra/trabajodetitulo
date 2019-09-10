<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SushiRequest extends FormRequest
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
            'envoltura' => ['required'],
            'descripcion' =>['required'],
            'precio' => ['required','min:100', 'max:100000','numeric'],
            'cortes' => ['required']

        ];
    }
    public function messages()
    {
        return[
            'envoltura.required' => 'Ingrese la envoltura',
            'precio.required' => 'Ingrese el precio',
            'cortes.required' => 'Ingrese el N° de cortes',
            'precio.min' => 'El precio tiene que ser mayor que 100',
            'precio.max' => 'El precio tiene que ser menor a 100000',
            'precio.numeric' => 'El precio debe ser un número',

        ];
    }
}
