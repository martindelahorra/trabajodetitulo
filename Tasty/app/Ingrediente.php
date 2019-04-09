<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $primaryKey = 'cod_ingrediente';
    protected $fillable = ['cod_ingrediente','nombre','precio','categoria'];
}
