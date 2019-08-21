<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sushi extends Model
{
    protected $table = 'sushis';
    public $primaryKey = 'cod_sushi';
    public $fillable = ['envoltura', 'descripcion', 'cortes','imagen','precio'];
    public $timestamps = false;

    public function tsushisushis()
    {
       return $this->hasMany('App\TsushiSushi', 'cod_sushi');
    }
    
}
