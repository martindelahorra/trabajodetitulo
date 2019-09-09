<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{
    use SoftDeletes;
    protected $table = 'metodos_pago';
    public $primaryKey = 'id_metodo';
    
    protected $dates =['deleted_at'];
    public $fillable = ['id_metodo','nombre_metodo'];
    public $timestamps = false;

    public function pedido()
    {
        return $this->hasMany('App\Pedido');
    }
}
