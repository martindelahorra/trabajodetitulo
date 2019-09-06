<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $primaryKey = 'cod_pedido';
    public $fillable = ['id_usuario', 'estado_pedido', 'descripcion','total_pedido', 'fecha', 'telefono', 'direccion', 'nombre_completo'];
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
        return $this->belongsTo('App\MetodoPago');
    }
}
