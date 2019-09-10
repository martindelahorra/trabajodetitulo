<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agregado extends Model
{
    use SoftDeletes;
    protected $table = 'agregados';
    protected $dates =['deleted_at'];
    public $timestamps = false;
    public $primaryKey = 'cod_agre';
    public $fillable = ['cod_agre','nom_agre','precio','descripcion','tipo','sugerido','imagen','cod_tamaño','bebida_litros'];
    public function pizzatamano()
    {
        return $this->belongsTo('App\PizzaTamano', 'cod_tamaño');
    }
    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido','agregado_pedido','cod_agre','cod_pedido');
    }
}
