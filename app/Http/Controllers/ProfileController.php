<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(User $user) {


        $tweets = $user->tweets()->latest()->paginate(50);

        return view('profiles.show', compact(['user','tweets']));
    }

    public function edit(User $user) {

        if(auth()->user()->is($user)) {

            return view('profiles.edit',compact('user'));
        } else {
            abort(404);
        }
    }

    public function update(User $user) {



    //    $attributes =  request()->validate([
    //         'name'     =>  'string|required|max:255',
    //         'username' => 'string|required|max:255,alpha_dash',Rule::unique('users')->ignore($user),
    //         'avatar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'email'    =>  'string|email|required|max:255',Rule::unique('users')->ignore($user),
    //         'password' =>  'required|string|min:8|max:255|confirmed'
    //     ]);


        if(request()->hasFile('avatar')) {
           $avatar = request()->avatar;
           $image_name = time(). '.'. $avatar->getClientOriginalName();


          // delete the old image

          if(auth()->user()->avatar) {

              Storage::delete('public/profile_images/'. $user->avatar);
          }

           request()->avatar->storeAs('profile_images',$image_name,'public');

           $user->avatar = $image_name;


        }
       if(request()->has('name')) {
        $user->name = request()->name;
       }
       if(request()->has('username')) {
        $user->username = request()->username;
       }
       if(request()->has('email')) {
        $user->email = request()->email;
       }
       if(request()->has('password') && request()->password != null) {
        $user->password = request()->password;
       }

        $user->save();


        return redirect($user->profilePath());
    }
}
