<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CombustibleAsignado extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_responsable_id','product_id','cantidad','unidad_id','asignado_a'
    ];

    protected $table ="combustible_asignado";
    
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


    public function users()
    {
        return $this->belongsTo(Users::class,'user_responsable_id');
    }
}
