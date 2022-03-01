<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnalisisArenas extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'lote_arena_id','analisis_laboratorio_id','status_id',
        'muestreador_user_id','created_by_user','accepted_by_user', 'processed_by_user'
    ];

    protected $table ="analisis_arenas";
    
    protected $dates = ['created_at'];
    const UPDATED_AT = null;

    public function molino()
    {
        return $this->belongsTo(Molino::class,'molino_id');
    }

    public function status_()
    {
        return $this->belongsTo(Status::class,'status');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    // public function productsAnalisisLab()
    // {
    //     return $this->hasMany(ProductsAnalisisLab::class,'id');
    // }

    // public function analisisLabOperacion()
    // {
    //     return $this->hasMany(AnalisisLabOperacion::class,'id');
    // }
}
