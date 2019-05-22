<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TablaSushiRequest extends FormRequest
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
            'nombre' => ['required'],
            'precio' => ['required'],
            'imagen' => ['image', 'required']
        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Ingrese el nombre',
            'precio.required' => 'Ingrese el precio',
            'imagen.required' => 'Ingrese una imagen',
            'imagen.image' => 'Ingrese un formato valido (jpeg, png, bmp, gif, or svg)'
        ];
    }
}
