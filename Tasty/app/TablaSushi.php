<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablaSushi extends Model
{   
    protected $table = 'tabla_sushis';
    public $primaryKey = 'cod_tabla';
    protected $fillable = ['nombre', 'precio'];

    public function tsushisushis()
    {
       return $this->hasMany('App\TsushiSushi', 'cod_tabla');
    }
}
