<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoteArena extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'molino_id','codigo','status','toneladas_humedad','toneladas_seca','responsable','deleted_by_user','created_by_user'
    ];

    protected $table ="lote_arena";
    
    protected $dates = ['created_at','updated_at'];

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
        return $this->belongsTo(User::class,'created_by_user');
    }

    public function userDelete()
    {
        return $this->belongsTo(User::class,'deleted_by_user');
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
