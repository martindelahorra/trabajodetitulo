<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IngredienteRequest extends FormRequest
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
            'nombre' => ['required','unique:ingredientes,nombre'],
            'precio' => ['required','gt:0','numeric'],
            'categoria' => [Rule::in(['C', 'V', 'O']),]
        ];
    }

    public function messages()
    {
        return[
            'nombre.required' => 'Ingrese el nombre',
            'nombre.unique' => 'El nombre elegido ya existe',
            'precio.required' => 'Ingrese el precio',
            'precio.gt' => 'El precio tiene que ser mayor que 0',
            'precio.numeric' => 'El precio debe ser un número',
            'categoria.in' => 'Seleccione una categoría'

        ];
    }
}
