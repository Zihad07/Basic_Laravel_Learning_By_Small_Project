<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications(){
        

        // dd(auth()->user()->notifications->first()->data['discussion']['slug']);
        // Mark as read
        auth()->user()->unreadNotifications->markAsRead();

        // display all notification

        return view('users.notifications',[
            'notifications'=>auth()->user()->notifications()->paginate(5)
        ]);
    }
}
