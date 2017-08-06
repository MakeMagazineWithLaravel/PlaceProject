<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $table = 'places';

    protected $fillable = ['title','categories_id','description','photo','reviews'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category','categories_id');
    }

    public function image(){
        return $this->hasMany('App\Image','place_id');
    }
    public function rating(){
        return $this->hasMany('App\Rating','place_id');
    }
}
