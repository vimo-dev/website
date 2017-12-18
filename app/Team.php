<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //

    public function users() {
        return $this->hasMany('App\User');
    }

    public function matches() {
        return $this->hasMany('App\Match');
    }

    public function teamroles() {
        return $this->hasMany('App\Teamrole');
    }
}
