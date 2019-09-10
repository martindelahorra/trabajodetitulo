<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agregado_pedido extends Model
{
    protected $table = 'agregado_pedido';
    public $primaryKey = 'id_agregado';
    public $fillable = ['cod_pedido', 'cod_agre', 'cantidad'];
    public $timestamps = false;
}
