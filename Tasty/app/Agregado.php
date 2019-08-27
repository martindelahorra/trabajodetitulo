<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    protected $table = 'agregados';
    public $timestamps = false;
    protected $primaryKey = 'cod_agre';
    public $fillable = ['cod_ingrediente','nom_agre','precio','descripcion','tipo','sugerido'];
}
