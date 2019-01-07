<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id'); // optional param
    }
    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function getFullPathAttribute($value)
    {
        $imgPath = 'no_file';

        return ($this->store_id == "5c32f43ac79ee315c8a70fa5" ? 'store_exist' : 'store_not_exist');
    }
}
