<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notifiable;


class UserNotifocationController extends Controller
{
public function notifications(){
    auth()->user()->unreadNotifications->markAsRead();
    $notifications= auth()->user()->notifications;
    return view('users.notifications',compact('notifications'));
}

public function viewNotifications($slug){
    return view('users.view_notification',compact('slug'));

}
}
