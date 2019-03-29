<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sushi extends Model
{
    public $primaryKey = 'cod_sushi';
    protected $fillable = ['cod_sushi','envoltura','descripcion','cortes','precio_roll','stock'];
    					
}
