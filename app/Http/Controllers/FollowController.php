<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // follow the the user

    public function store(User $user) {


        auth()->user()->toggleFollow($user);

        return back();
    }
}
