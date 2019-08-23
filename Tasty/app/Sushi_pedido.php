<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sushi_pedido extends Model
{
    protected $table = 'sushi_pedido';
    public $primaryKey = 'id_sushi';
    public $fillable = ['cod_pedido', 'cod_sushi', 'cantidad'];
    public $timestamps = false;

}
