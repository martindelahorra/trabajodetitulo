<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaIngrediente extends Model
{
    protected $table = 'pizzas_ingredientes';
    public $primaryKey = 'cod_pi';
    public $timestamps = false;
    protected $fillable = ['cod_pizza', 'cod_ingrediente'];

    public function pizza()
    {
        return $this->belongsTo('App\Pizza','cod_pizza');
    }
    public function ingrediente()
    {
        return $this->belongsTo('App\Ingrediente','cod_ingrediente');
    }
}
