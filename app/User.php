<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function siterole() {
        return $this->belongsTo('App\Siterole');
    }

    public function ingamerole() {
        return $this->belongsTo('App\Ingamerole');
    }

    public function teamrole() {
        return $this->belongsTo('App\Teamrole');
    }
}
