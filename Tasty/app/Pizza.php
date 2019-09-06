<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $primaryKey = 'cod_pizza';
    protected $fillable = ['cod_pizza', 'precio', 'cod_tamaño'];
    public $timestamps = false;
    public function pizzaingredientes()
    {
        return $this->hasMany('App\PizzaIngrediente', 'cod_pizza');
    }
    public function pizzatamano()
    {
        return $this->belongsTo('App\PizzaTamano', 'cod_tamaño');
    }
}
