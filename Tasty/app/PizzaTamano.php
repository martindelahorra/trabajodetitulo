<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PizzaTamano extends Model
{
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $table = 'pizza_tamaños';
    public $primaryKey = 'cod_tamaño';
    public $timestamps = false;
    protected $fillable = ['nombre', 'precio','imagen'];
}
