<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla_pedido extends Model
{
    protected $table = 'tabla_pedido';
    public $primaryKey = 'id_tabla';
    protected $fillable = ['cod_pedido', 'cod_tabla', 'cantidad'];
    public $timestamps = false;
}
