<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function followed() {
        return $this->hasMany('App\Friend', 'user_one_id')->where('status', config('friend.status.is_friend'));
    }

    public function followers() {
        return $this->hasMany('App\Friend', 'user_two_id')->where('status', config('friend.status.is_friend'));
    }

    public function user() {
        return $this->belongsTo('App\User');
    }


}
