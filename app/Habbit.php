<?php

namespace App;

use Cartalyst\Tags\TaggableTrait;
use Illuminate\Database\Eloquent\Model;

class Habbit extends Model
{
    use TaggableTrait;

    public function habbit_dates() {
        return $this->hasMany('App\HabbitDate', 'habit_id');
    }

    public function posts() {

        return $this->hasMany('App\Post', 'post_type_id')->where('post_type', get_class($this))->orderByDesc('id')->get();
    }
}
