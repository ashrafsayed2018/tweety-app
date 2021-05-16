<?php

namespace App;

use App\Notifications\newLikeAdded;

trait Likeable {


    // method to return the likes and dislikes of a specific tweet

      public function scopeWithLikes($query) {

         return $query->leftJoinSub(
            'SELECT tweet_id , sum(liked) likes, sum(!liked) dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
      }
       // make like functionality

        public function like($user = null) {

            $this->likes()->updateOrCreate([

               'user_id' => $user ? $user->id : auth()->id

            ], [

                'liked'   => true

            ]);


          $user->notify(new NewLikeAdded($this));
        }

        // dislikes functionality

        public function dislike($user = null) {

            $this->likes()->updateOrCreate([

                'user_id' => $user ? $user->id : auth()->id

             ], [

                 'liked'   => false

             ]);
        }

        // check if the tweet is liked by a given user

        public function isLikedBy(User $user) {


            // another way to check if the user is already liked the tweet

           return  (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();

        }

        // method to check if the tweet is liked by the user

        public function isDisLikedBy(User $user) {

            return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
        }
}
