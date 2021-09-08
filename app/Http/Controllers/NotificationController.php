<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewsNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//    public function index()
//    {
//        return view('test');
//    }

    public function sendOfferNotification() {
        $user = User::first();
//        $user = User::first();
        $newsData = [
            'body' => 'You received a new Notification',
            'thanks' => 'Thank you',
            'newsText' => 'Check out the Notification test',
            'url' => url('/news'),
            'slug' => 'test slug2',
//            'news_id' => 007
        ];

        Notification::send($user, new NewsNotification($newsData));
//        $user->notify(new NewsNotification($newsData));

    }
}
