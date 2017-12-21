<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    public function team1() {
        return $this->belongsTo('App\Team', 'id', 'team1_id');
    }

    public function team2() {
        return $this->belongsTo('App\Team', 'id', 'team1_id');
    }
}
