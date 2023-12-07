<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public function faculty() {
        return $this->belongsTo('App\Faculty');
    }
}
