<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewsNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use function Composer\Autoload\includeFile;

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

    public function sendOfferNotification($slug,$id) {
        $user = User::first();
//        $user = User::first();
        $newsData = [
            'body' => 'News Added',
            'thanks' => 'Thank you',
            'newsText' => 'Check out the News',
            'url' => url('/news'),
            'slug' => $slug,
            'id' => $id,
//            'news_id' => 007
        ];
        Notification::send($user, new NewsNotification($newsData));
//        $user->notify(new NewsNotification($newsData));

    }
}
