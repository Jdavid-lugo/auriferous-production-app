<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Muestreador extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id'
    ];

    protected $table ="muestreador";
    
    protected $dates = ['created_at'];
    const UPDATED_AT = null;
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
