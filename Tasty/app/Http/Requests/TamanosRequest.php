<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamanosRequest extends FormRequest
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
      'precio' => ['required', 'gt:100', 'lt:100000'],
      'imagen' => ['required', 'image'],
    ];
  }
  public function messages()
  {
    return [
      'nombre.required' => 'Ingrese nombre del tamaño',
      'precio.required' => 'Ingrese el precio',
      'precio.gt' => 'Precio debe ser mayor que $100',
      'precio.lt' => 'Precio debe ser menor que $100000',
      'imagen.required' => 'Debe contener una imagen',
      'imagen.image' => 'Ingrese un formato valido (jpeg, png, bmp, gif, or svg)',
    ];
  }
}
