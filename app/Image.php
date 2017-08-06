<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    protected $fillable = ['name','place_id'];

    public function place(){
        return $this->belongsTo('App\Place');
    }
}
