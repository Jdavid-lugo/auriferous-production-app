<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Molino extends Model
{
    
    use SoftDeletes;
    
    protected $fillable = [
        'nombre', 'rif', 'tlf', 'sector'
    ];

    protected $dates = ['created_at','updated_at'];

    // public function transactions()
    // {
    //     return $this->hasMany('App\LoteArena');
    // }

    // public function receipts()
    // {
    //     return $this->hasMany('App\Receipt');
    // }
}
