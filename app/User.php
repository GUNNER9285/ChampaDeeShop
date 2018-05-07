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
    protected $table = "user";
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'password', 'address'
    ];
    public $timestamps = true;

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
