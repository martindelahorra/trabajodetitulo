<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgregadoEditRequest extends FormRequest
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
            'precio' => ['required','gte:1000', 'lt:100000'],
            'tipo' => ['required',Rule::in(['A', 'B','P','T','S'])],
            'descripcion' => ['required']

        ];
    }
    public function messages()
    {
        return[
            'nombre.required' => 'Ingrese el nombre',
            'precio.required' => 'Ingrese el precio',
            'precio.gte' => 'Precio debe ser mayor a $1000',
            'precio.lt' => 'Precio debe ser menor a $100000',
            'descripcion.required' => 'Debe ingresar una descripcion',
            'tipo.required' => 'Seleccione un tipo',
            'tipo.in' =>'Tipo no valido'
        ];
    }
}
