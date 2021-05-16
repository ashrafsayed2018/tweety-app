<?php

namespace App;

use App\Notifications\NewFollower;

/**
 *
 */
trait Followable
{
        // method to check if the user is following a sepecfic user

        public function isFollowing(User $user) {


            return $this->follows()->where('following_user_id', $user->id)->exists();

        }


        // method to follow a specific user

        public function follow(User $user) {

          return  $this->follows()->attach($user);



        }



        //method to delete the follow of the given user

        public function unfollow(User $user) {
            return $this->follows()->detach($user);
        }


        // method to toggle the follow of the user

        public function toggleFollow(User $user) {

            /* have the authanticted user follow the given user
            * check if the authanticted user already follow the given user or not
            */

            // $this->follows()->toggle($user);

            if($this->isFollowing($user)) {

                // delete the follow

                return $this->unfollow($user);

            }

                // follow the given user

                $user->notify(new NewFollower($this));

               return  $this->follow($user);


        }

        // relatinship with followrs


        public function follows() {

            return $this->belongsToMany(User::class,'follows','user_id','following_user_id');

        }
}
