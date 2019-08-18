<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class Usuario extends Authenticable
{
  use Notifiable;
  protected $table = 'usuarios';
  protected $primaryKey = 'id_usuario';
  protected $fillable = ['username','rut','nombre_completo','password','rol', 'telefono', 'direccion']; 

  public function pedido()
  {
    return $this->belongsTo('App\Pedido');


  }
  
}
