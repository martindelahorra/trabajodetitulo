<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $dates =['deleted_at'];
    protected $primaryKey = 'cod_ingrediente';
    protected $fillable = ['cod_ingrediente','nombre','precio','categoria'];
}
