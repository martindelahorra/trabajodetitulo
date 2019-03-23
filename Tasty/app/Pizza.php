<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $primaryKey = 'cod_pizza';
    protected $fillable = ['cod_pizza','precio_pizza','tamaño','descripcion','disponible','ingrendientes'];
}
