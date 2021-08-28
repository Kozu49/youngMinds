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
use App\Models\ClientContact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Support\Carbon;

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

    public function contactUs(Request $request){
        $data=json_encode($request->all());
       $result=json_decode($data);

        ClientContact::insert([
            'name'=>$result->name,
            'email'=>$result->email,
            'subject'=>$result->subject,
            'message'=>$result->message,
            'status'=>0,
            'created_at'=>Carbon::now(),
    ]);
        return "Form Submitted Successfully";
    }



}
