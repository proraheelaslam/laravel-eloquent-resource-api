<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Store extends Eloquent
{
    //
    protected $table = "stores";

    // many store belongs to one company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
