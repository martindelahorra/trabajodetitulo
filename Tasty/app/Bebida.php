<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    protected $table = 'bebidas';
    public $timestamps = false;
    public $primaryKey = 'cod_bebida';
    public $fillable = ['cod_bebida','nombre'];
}
