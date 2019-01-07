<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    //
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
