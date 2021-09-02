<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use App\Repository\SliderRepository;
use Illuminate\Support\Carbon;
class SliderController extends Controller
{
    /**
     * @var SliderRepository
     */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {

        $this->sliderRepository = $sliderRepository;
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliderRepository->all();
        return view('backend.slider.index', compact('sliders'));
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
    public function store(SliderRequest $request)
    {
        try {
            $slider_image=$request->file('image');
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($slider_image->getClientOriginalExtension());
            $img_name=$name_gen. '.'.$img_ext;
            $up_location='image/slider/';
            $last_img=$up_location.$img_name;
            $slider_image->move($up_location,$img_name);
            Slider::insert([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$last_img,
                'created_at'=>Carbon::now(),

            ]);
            session()->flash('success', 'Slider successfully created!');
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
            $edits = $this->sliderRepository->findById($id);
            if ($edits->count() > 0) {
                $sliders = $this->sliderRepository->all();
                return view('backend.slider.index', compact('edits', 'sliders'));
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
    public function update( SliderRequest $request, $id)
    {
        $id = (int)$id;
        $slider = $this->sliderRepository->findById($id);
        try {
            $old_image=$slider->image;
            $slider_image=$request->file('image');
            if ($slider_image){
                $name_gen=hexdec(uniqid());
                $img_ext=strtolower($slider_image->getClientOriginalExtension());
                $img_name=$name_gen. '.'.$img_ext;
                $up_location='image/slider/';
                $last_img=$up_location.$img_name;
                $slider_image->move($up_location,$img_name);
                unlink($old_image);

                $slider->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'image'=>$last_img,
                    'created_at'=>Carbon::now(),

                ]);
                session()->flash('success', 'Slider Updated successfully!');
                return redirect(route('slider.index'));
            }else{
                $slider->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'created_at'=>Carbon::now(),
                ]);
                session()->flash('success', 'Slider Updated successfully!');
                return redirect(route('slider.index'));
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
            $value = $this->sliderRepository->findById($id);
            if ($value) {

                $old_image=$value->image;
                unlink($old_image);
                $valueId = $value->id;
                $value->delete();
                session()->flash('error', 'Slider successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

    public function deleteCheckedSlider(Request $request){
        $ids=$request->ids;
        Slider::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Slider deleted sucessfully"]);
    }
}
