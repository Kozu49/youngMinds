<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\NavBar;
use App\Models\Notice;
use App\Models\News;
use App\Models\Event;
use App\Models\Download;
use App\Models\Contact;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        $navbars=NavBar::all();
        $notices=Notice::Orderby('id','desc')->get();
        $news=News::Orderby('id','desc')->take(4)->get();
        $events=Event::Orderby('id','desc')->get();
        $downloads=Download::all();
        $contact=Contact::first();
        $social=Social::first();
        return view('frontend.home',compact('sliders','navbars','notices','news','events','downloads'));
    }

    public function newsShow(){

        $navbars=NavBar::all();
        $newses=News::Orderby('id','desc')->simplePaginate(4);
        return view('frontend.news',compact('navbars','newses'));
    }

    public function newsSingleShow($slug){
        $navbars=NavBar::all();
        $news=News::where('slug',$slug)->first();
        return view('frontend.newssingle',compact('navbars','news'));
    }

    public function eventShow(){
        $navbars=NavBar::all();
        $events=Event::Orderby('id','desc')->get();
        return view('frontend.event',compact('navbars','events'));
    }

    public function noticeShow(){
        $navbars=NavBar::all();
        $notices=Notice::Orderby('id','desc')->simplePaginate(4);
        return view('frontend.notice',compact('navbars','notices'));
    }

    public function download(){
        $navbars=NavBar::all();
        $downloads=Download::Orderby('id','desc')->get();
        return view('frontend.download',compact('navbars','downloads'));
    }

    public function contact(){
        $navbars=NavBar::all();
        $contact=Contact::first();
        $social=Social::first();
        return view('frontend.contact',compact('navbars','contact','social'));
    }


}
