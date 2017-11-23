<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id','measurement','size','gender','age_group'
    ];

    public function user()
    {
       return $this->belongsTo('App\User');
     }
}
