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
            'precio' => ['required','gt:100', 'lt:100000','numeric'],
            'cortes' => ['required', 'gte:5'],
            'imagen' => ['required','image']

        ];
    }
    public function messages()
    {
        return[
            'envoltura.required' => 'Ingrese la envoltura',
            'precio.required' => 'Ingrese el precio',
            'descripcion.required' =>'Ingrese una descripcion de el contenido',
            'cortes.required' => 'Ingrese el N° de cortes',
            'precio.gt' => 'El precio tiene que ser mayor que $100',
            'precio.lt' => 'El precio tiene que ser mayor que $100000',
            'cortes.gt' => 'Los Rolls pueden tener minimo 5 cortes',
            'precio.numeric' => 'El precio debe ser un número',
            'imagen.required' => 'Imagen requerida',
            'imagen.image' => 'Debe ser formato (jpeg, png, bmp, gif, svg, or webp)'

        ];
    }
}
