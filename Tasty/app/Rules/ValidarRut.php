<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarRut implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace("-","",$value);
        $value = str_replace(".","",$value);
        $value = strtoupper($value);

        $rut = substr($value,0,-1);
        $dv =  substr($value,-1);

        $suma = 0;
        $factor = 2;

        foreach(array_reverse(str_split($rut)) as $v)
        {
          if($factor ==8)
            $factor = 2;
          $suma += $v * $factor;
          ++$factor;
        }

        $digito = 11 - ($suma%11);

        if($digito == 11)
          $digito = 0;
        if($digito == 10)
          $digito = 'K';
        if($digito == strtoupper($dv))
          return true;
        else
          return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
     public function message()
     {
         return 'RUT ingresado no es válido';
     }
}
