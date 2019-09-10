<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    public $primaryKey = 'id_venta';
    public $fillable = ['cod_pedido','monto_total', 'fecha_venta'];
    public $timestamps = false;


    public function pedido()
    {
        return $this->hasOne('App\Pedido', 'cod_pedido');
    }
}
