<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    protected $fillable = ['name','place_id','user_id','original_name'];

    public function place(){
        return $this->belongsTo('App\Place');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
