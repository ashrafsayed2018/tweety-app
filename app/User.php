<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use Notifiable;

    // custom trait named Followable

    use Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationship with tweet

    public function tweets() {

        return $this->hasMany(Tweet::class);
    }

    // custom mutator to set the hashed password

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = bcrypt($value);
    }


    public function timeline() {

        /*
        include all user tweets
        as well as the user who following tweets
        in descending order
        */

        $friends = $this->follows()->pluck('id');



          $tweets = Tweet::whereIn('user_id', $friends)
          ->orWhere('user_id', $this->id)
          ->withLikes()
          ->latest()
          ->paginate(50);

         return $tweets;

    }

    // method to profile path

    public function profilePath($append = '') {
        $path =  route('profile', $this->username);

        return $append ? "{$path}/${append}" : $path;
    }

    // the relationship with likes

    public function likes () {

        return $this->hasMany(Like::class);
    }

}
