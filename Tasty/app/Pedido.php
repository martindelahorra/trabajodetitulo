<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $primaryKey = 'cod_pedido';
    public $fillable = ['id_usuario', 'estado_pedido', 'descripcion','total_pedido', 'fecha', 'telefono', 'direccion', 'nombre_completo', 'delivery'];
    public $timestamps = false;


    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function tabla_sushi()
    {
        return $this->belongsToMany('App\Tabla_pedido')->withPivot('cantidad');
    }
    public function pizza_pedido()
    {
        return $this->belongsToMany('App\Pizza_pedido')->withPivot('cantidad');

    }
    public function sushi_pedido()
    {
        return $this->belongsToMany('App\Sushi_pedido')->withPivot('cantidad');
    }
    public function metodo_pago()
    {
        return $this->belongsTo('App\MetodoPago', 'id_metodo');
    }
    public function metodo_pago_borrados()
    {
        return $this->belongsTo('App\MetodoPago', 'id_metodo')->withTrashed();
    }
    public function agregados()
    {
        return $this->belongsToMany('App\Agregado','agregado_pedido','cod_pedido','cod_agre')->withPivot('cantidad');
    }
    public function venta()
    {
        return $this->belongsTo('App\Venta', 'id_venta');
    }
}
