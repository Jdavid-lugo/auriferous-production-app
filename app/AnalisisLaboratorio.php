<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AnalisisLaboratorio extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'fecha','analisis_id','valor'
    ];

    protected $table ="analisis_laboratorio";
    
    protected $dates = ['created_at','updated_at'];

    public function analisis()
    {
        return $this->belongsTo(Analisis::class,'analisis_id');
    }

    public function productsAnalisisLab()
    {
        return $this->hasMany(ProductsAnalisisLab::class,'id');
    }

    public function analisisLabOperacion()
    {
        return $this->hasMany(AnalisisLabOperacion::class,'id');
    }
}
