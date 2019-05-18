<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Expertness extends Model
{

    use TaggableTrait;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function posts() {

        return $this->hasMany('App\Post', 'post_type_id')->where('post_type', get_class($this))->orderByDesc('id')->get();
    }

}
