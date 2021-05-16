<?php

namespace App\Http\Controllers;

use App\User;
use App\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{

    public function store(Tweet $tweet) {

        $user = auth()->user();

        $tweet->like($user);

        return back();
    }

    public function destroy(Tweet $tweet) {

        $user = auth()->user();
        $tweet->dislike($user);

        return back();
    }
}
