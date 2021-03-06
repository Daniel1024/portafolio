<?php

namespace App\Models;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getGravatarAttribute()
    {
        $default = 'mm'; //config('app.url') . '/avatar.jpg';
        $size = 150;
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "//www.gravatar.com/avatar/$hash?d=$default&s=$size";
    }
}
