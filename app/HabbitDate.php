<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabbitDate extends Model
{
    protected $table = 'habbit_date';


    public function habbit() {
        return $this->belongsTo('App\Habbit');
    }
}
