<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    protected $table = 'agregados';
    public $timestamps = false;
    public $primaryKey = 'cod_agre';
    public $fillable = ['cod_agre','nom_agre','precio','descripcion','tipo','sugerido','imagen','cod_tamaño','bebida_litros'];
    public function pizzatamano()
    {
        return $this->belongsTo('App\PizzaTamano', 'cod_tamaño');
    }
}
