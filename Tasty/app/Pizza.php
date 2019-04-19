<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $primaryKey = 'cod_pizza';
    protected $fillable = ['cod_pizza','precio','tamaño'];
    public $timestamps = false;
    public function pizzaingredientes()
    {
       return $this->hasMany('App\PizzaIngrediente', 'cod_pizza');
    }
}
