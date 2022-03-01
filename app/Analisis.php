<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Analisis extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'valores_id','tipo_analisis_id','comentarios'
    ];

    protected $table ="analisis";
    
    protected $dates = ['created_at','updated_at'];

    public function tipoAnalisis()
    {
        return $this->belongsTo(TipoAnalisis::class,'tipo_analisis_id');
    }

    public function valoresAnalisis()
    {
        return $this->belongsTo(ValorAnalisis::class,'valores_id');
    }
}
