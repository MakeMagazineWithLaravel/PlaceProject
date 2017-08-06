<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'ratings';

    protected $fillable = ['user_id','place_id','comment','q_of_food','service_q','interior'];
}
