<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zodiac extends Model
{
    
    public function scores() {
        return $this->hasMany('App\Horoscope','zodiacId','id')->where(['status'=>1])->orderBy('orderid','asc'); 
    }

    public function totalscore() {
        return $this->hasMany('App\Horoscope','zodiacId','id')->selectRaw('horoscopes.months,SUM(horoscopes.score) as totalscore') ->groupBy('horoscopes.months');       
    }
    
}
