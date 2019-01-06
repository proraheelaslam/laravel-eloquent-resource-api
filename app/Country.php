<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function articles()
    {
        return $this->hasManyThrough(Article::class,User::class,'country_id','user_id');
    }
}
