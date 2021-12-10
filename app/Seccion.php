<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seccion extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre'
    ];
    protected $table ="seccion";
    
    protected $dates = ['created_at','updated_at'];
}
