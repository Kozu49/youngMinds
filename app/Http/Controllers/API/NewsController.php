<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\NewsRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::all();
        return response([ 'news' => NewsResource::collection($news), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'news_date' => 'required',
            'banner_image' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

//        $news = News::create($data);
        try {
            $banner_image=$request->file('banner_image');
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($banner_image->getClientOriginalExtension());
            $img_name=$name_gen. '.'.$img_ext;
            $up_location='image/news/';
            $last_img=$up_location.$img_name;
            $banner_image->move($up_location,$img_name);
            $news=News::create([
                'title'=>$request->title,
                'content'=>$request->content,
                'news_date'=>$request->news_date,
                'user_id'=>$request->user_id,
                'banner_image'=>$last_img,
                'slug'=>$request->slug,
            ]);
            return response([ 'news' => new NewsResource($news), 'message' => 'Created successfully'], 200);

        } catch (\Exception $e) {
            $e->getMessage();
            throw new HttpException(500, $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return response([ 'news' => new NewsResource($news), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
//
        $news->update($request->all());
        return response([ 'news' => new NewsResource($news), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response(['message' => 'Deleted']);
    }
}
