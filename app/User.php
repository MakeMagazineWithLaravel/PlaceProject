<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function place(){
        return $this->hasMany('App\Place');
    }
    public function place_id($id){
        return $this->hasOne('App\Place')->find($id);
    }
    public function rating(){
        return $this->hasMany('App\Rating');
    }
    public function comment($id){
        return $this->hasOne('App\Rating')->where('place_id','=',$id)->first();
    }
    public function image(){
        return $this->hasMany('App\Image');
    }
}
