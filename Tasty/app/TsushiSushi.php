<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TsushiSushi extends Model
{
    protected $table = 'tsushi_sushis';
    public $primaryKey = 'cod_inter';
    protected $fillable = ['cod_tabla', 'cod_sushi'];
    public $timestamps = false;

    public function tabla()
    {
        return $this->belongsTo('App\TablaSushi','cod_tabla');
    }
    public function sushi()
    {
        return $this->belongsTo('App\Sushi','cod_sushi');
    }
}
