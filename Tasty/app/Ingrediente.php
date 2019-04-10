<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model
{
    use SoftDeletes;
    protected $dates =['deleted_at'];
    public $timestamps = false;
    protected $primaryKey = 'cod_ingrediente';
    protected $fillable = ['cod_ingrediente','nombre','precio','categoria'];
}
