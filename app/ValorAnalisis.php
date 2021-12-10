<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ValorAnalisis extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre'
    ];
    protected $table ="valores_analisis";
    
    protected $dates = ['created_at','updated_at'];
}
