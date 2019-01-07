<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    //
    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function company_setting()
    {
        return $this->hasOne(CompanySetting::class);
    }
}
