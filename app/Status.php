<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
        
    use SoftDeletes;
    
    protected $fillable = [
        'nombre','id_seccion','activo'
    ];

    protected $table ="status";
    
    protected $dates = ['created_at','updated_at'];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class,'id_seccion');
    }

    public function loteArena()
    {
        return $this->hasMany(LoteArena::class,'id');
    }

    public function analisisLabOperacion()
    {
        return $this->hasMany(AnalisisLabOperacion::class,'id');
    }
}
