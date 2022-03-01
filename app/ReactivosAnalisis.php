<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ReactivosAnalisis extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'product_id','tipo_analisis_id'
    ];

    protected $table ="tipo_analisis_products";
    
    protected $dates = ['created_at','updated_at'];

    public function tipoAnalisis()
    {
        return $this->belongsTo(TipoAnalisis::class,'tipo_analisis_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
