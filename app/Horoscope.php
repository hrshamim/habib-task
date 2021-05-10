<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    
    public function zodic()
    {
        //return $this->hasOne('App\Zodic', 'zodicId','id');
        return $this->belongsTo(App\Zodic::class, 'zodicId', 'id');
    }
}
