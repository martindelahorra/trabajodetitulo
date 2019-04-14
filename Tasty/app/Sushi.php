<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sushi extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $dates =['deleted_at'];
    protected $primaryKey = 'cod_sushi';
    protected $fillable = ['cod_sushi','envoltura','descripcion','cortes','precio_roll'];
    
    
    					
}
