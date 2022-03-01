<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
        
    use SoftDeletes;
    
    protected $fillable = [
        'nombre', 'siglas'
    ];

    protected $dates = ['created_at','updated_at'];

    public function productsAnalisisLab()
    {
        return $this->hasMany(ProductsAnalisisLab::class,'id');
    }

    public function combustibleAsignado()
    {
        return $this->hasMany(CombustibleAsignado::class,'id');
    }
}
