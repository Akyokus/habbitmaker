<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function expertnesses() {
        return $this->hasMany('App\Expertness');
    }


}
