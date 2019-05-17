<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function user_one() {
        return $this->belongsTo('App\User');
    }

    public function user_two() {
        return $this->belongsTo('App\User');
    }

}
