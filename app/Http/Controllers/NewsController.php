<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Repository\NewsRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
/**
* @var NewsRepository
     */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {

        $this->newsRepository = $newsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = $this->newsRepository->all();
        return view('backend.news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            $banner_image=$request->file('banner_image');
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($banner_image->getClientOriginalExtension());
            $img_name=$name_gen. '.'.$img_ext;
            $up_location='image/news/';
            $last_img=$up_location.$img_name;
            $banner_image->move($up_location,$img_name);
            News::insert([
                'title'=>$request->title,
                'content'=>$request->content,
                'news_date'=>$request->news_date,
                'user_id'=>Auth::user()->id,
                'banner_image'=>$last_img,
                'created_at'=>Carbon::now(),

            ]);
            session()->flash('success', 'News Successfully Added!');
            return back();

        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = (int)$id;
            $edits = $this->newsRepository->findById($id);
            if ($edits->count() > 0) {
                $newses = $this->newsRepository->all();
                return view('backend.news.index', compact('edits', 'newses'));
            } else {
                session()->flash('error', 'Id could not be obtained!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $id = (int)$id;
        $news = $this->newsRepository->findById($id);
        try {
            $old_banner=$news->banner_image;
            $banner_image=$request->file('banner_image');
            if ($banner_image){
                $name_gen=hexdec(uniqid());
                $file_ext=strtolower($banner_image->getClientOriginalExtension());
                $file_name=$name_gen. '.'.$file_ext;
                $up_location='image/news/';
                $last_file=$up_location.$file_name;
                $banner_image->move($up_location,$file_name);
                unlink($old_banner);

                $news->update([
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'news_date'=>$request->news_date,
                    'user_id'=>Auth::user()->id,
                    'banner_image'=>$last_file,
                    'created_at'=>Carbon::now(),

                ]);
                session()->flash('success', 'News Updated successfully!');
                return redirect(route('news.index'));
            }else{
                $news->update([
                    'title'=>$request->title,
                    'content'=>$request->content,
                    'news_date'=>$request->news_date,
                    'user_id'=>Auth::user()->id,
                    'created_at'=>Carbon::now(),

                ]);
                session()->flash('success', 'News Updated successfully!');
                return redirect(route('news.index'));
            }
        }
        catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $value = $this->newsRepository->findById($id);
            if ($value) {

                $old_image=$value->banner_image;
                unlink($old_image);
                $value->delete();
                session()->flash('error', 'News successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

    public function manoj(){
        echo 'asdasd';
    }
}
