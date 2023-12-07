<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueList extends Model
{
    protected $guarded = [];
    
    public function book() {
        return $this->belongsTo('App\Book');
    }

    public function issue() {
        return $this->belongsTo('App\Issue');
    }
}
