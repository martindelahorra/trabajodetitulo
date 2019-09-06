<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    protected $table = 'agregados';
    public $timestamps = false;
    protected $primaryKey = 'cod_agre';
    public $fillable = ['nom_agre','precio','descripcion','tipo','sugerido','imagen','cod_tamaño'];
    public function pizzatamano()
    {
        return $this->belongsTo('App\PizzaTamano', 'cod_tamaño');
    }
}
