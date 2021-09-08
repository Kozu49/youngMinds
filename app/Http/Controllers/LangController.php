<?php

namespace App\Http\Controllers;

//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function English($name){
//        Session::get('lang');
//        Session()->forget('lang');
//        Session()->put('lang','english');
//        return redirect()->back();
        dd($name);
    }

    public function Nepali(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','nepali');
        return redirect()->back();
    }
}
