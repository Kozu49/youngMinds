<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\News;
use DB;
class HomeController extends Controller


{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::select(\DB::raw("COUNT(*) as count"), \DB::raw("Year(news_date) as year"))
//            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('year')
            ->get();
//        $news = News::all();
//        dd($news);
        $data = [];
        foreach($news as $row) {
            $data['date'][] = $row->year;
            $data['data'][] =  (int) $row->count;
        }
//        dd($data);
        $data['chart_data'] = json_encode($data);
        return view('backend.dashboard',compact('data'));

    }

}
