<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    use Likeable;

    protected $guarded = [];

    public function user() {

        return $this->belongsTo(User::class);
    }


    // relationship with the likes table

    public function likes() {

        return $this->hasMany(Like::class);

    }
}
