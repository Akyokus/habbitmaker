<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function expertness() {
        return $this->belongsTo('App\Expertness');
    }
}
