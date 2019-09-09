<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $dates =['deleted_at'];
    public $primaryKey = 'id_metodo'; 
    protected $table = 'metodos_pago';    
       
    public $fillable = ['nombre_metodo'];
    

    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
}
