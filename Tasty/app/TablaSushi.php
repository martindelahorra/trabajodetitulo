<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class TablaSushi extends Model
{   use SoftDeletes;
    
    protected $dates =['deleted_at'];
    protected $table = 'tabla_sushis';
    public $primaryKey = 'cod_tabla';
    protected $fillable = ['nombre', 'precio','imagen'];
    public $timestamps = false;

    public function tsushisushis()
    {
       return $this->hasMany('App\TsushiSushi', 'cod_tabla');
    }
}
