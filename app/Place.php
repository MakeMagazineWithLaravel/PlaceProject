<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $table = 'places';

    protected $fillable = ['title','categories_id','description','photo','reviews','user_id','active'];

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
        return $this->hasMany('App\Rating','place_id')->orderBy('created_at','desc');
    }
    public function ratingId($id){
        return $this->hasOne('App\Rating','place_id')->find($id);
    }

    public function explain($id)
    {
        $place = Place::find($id);
        $ratings = $place->rating;
        $food = 0;
        $ser = 0;
        $inter = 0;
        $a = 0;
        foreach ($ratings as $rating) {
            if ($rating->accept) {
                $food += $rating->q_of_food;
                $ser += $rating->service_q;
                $inter += $rating->interior;
                $a++;
            }
        }
            if ($food > 0) {
                $food = $food / $a;
            }
             if ($ser > 0) {
                $ser = $ser / $a;
            }
            if ($inter > 0){
                $inter = $inter / $a;
            }

            $over = round(($food + $ser + $inter)/3);
            $data = [
                'food' => round($food,2),
                'ser' => round($ser,2),
                'inter' => round($inter,2),
                'over' => round($over,2)
            ];
        return $data;
    }
}
