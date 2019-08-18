<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza_pedido extends Model
{
    protected $table = 'pizza_pedido';
    public $primaryKey = 'id_pizza';
    protected $fillable = ['cod_pedido', 'cod_pizza', 'cantidad'];
    public $timestamps = false;
}
