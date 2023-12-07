<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded = [];

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function book() {
        return $this->belongsTo('App\Book');
    }
}
