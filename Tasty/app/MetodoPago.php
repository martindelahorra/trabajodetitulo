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
    public $fillable = ['nombre_metodo'];
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
}
