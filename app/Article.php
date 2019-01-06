<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $hidden = ['created_at','updated_at','user_id','id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
