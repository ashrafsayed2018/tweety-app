<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{

    public function show()
    {

        auth()->user()->unreadNotifications->markAsRead();
      return view('notifications.show',[
          'notifications' => auth()->user()->notifications
      ]);
    }
}
