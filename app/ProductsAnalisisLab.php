<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsAnalisisLab extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'product_id','analisis_lab_id','cantidad','unidad_id'
    ];

    protected $table ="products_analisis_lab";
    
    protected $dates = ['created_at','updated_at'];

    public function analisisLaboratorio()
    {
        return $this->belongsTo(AnalisisLaboratorio::class,'analisis_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidade::class,'unidad_id');
    }
}
