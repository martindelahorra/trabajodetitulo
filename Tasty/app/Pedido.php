<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $primaryKey = 'cod_pedido';
    public $fillable = ['id_usuario', 'estado_pedido', 'descripcion','total_pedido', 'fecha', 'telefono', 'direccion', 'nombre_completo'];
    public $timestamps = false;
}
