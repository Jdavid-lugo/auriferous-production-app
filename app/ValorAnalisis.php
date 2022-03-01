<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ValorAnalisis extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre'
    ];
    protected $table ="valores_analisis";
    
    protected $dates = ['created_at','updated_at'];
    
    public function analisis()
    {
        return $this->hasMany(Analisis::class,'id');
    }

}
