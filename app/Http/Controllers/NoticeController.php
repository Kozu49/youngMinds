<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Http\Requests\NoticeRequest;
use App\Repository\NoticeRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class NoticeController extends Controller
{
    /**
     * @var NoticeRepository
     */
    private $noticeRepository;

    public function __construct(NoticeRepository $noticeRepository)
    {

        $this->noticeRepository = $noticeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = $this->noticeRepository->all();
        return view('backend.notice.index', compact('notices'));
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
    public function store(NoticeRequest $request)
    {
        try {
                $notice_banner = $request->file('notice_banner');
                $name_gen = hexdec(uniqid());
                $notice_banner_ext = strtolower($notice_banner->getClientOriginalExtension());
                $notice_banner_name = $name_gen . '.' . $notice_banner_ext;
                $up_location = 'image/notice/banner/';
                $last_notice_banner = $up_location . $notice_banner_name;
                $notice_banner->move($up_location, $notice_banner_name);

                $notice_file = $request->file('notice_file');
                $notice_file_ext = strtolower($notice_file->getClientOriginalExtension());
                $notice_file_names = $name_gen . '.' . $notice_file_ext;
                $up_locations = 'image/notice/file/';
                $last_notice_file = $up_locations . $notice_file_names;
                $notice_file->move($up_locations, $notice_file_names);

                Notice::insert([
                    'title' => $request->title,
                    'content' => $request->content,
                    'notice_date' => $request->notice_date,
                    'notice_banner' => $last_notice_banner,
                    'notice_file' => $last_notice_file,
                    'user_id' => Auth::user()->id,
                    'created_at'=>Carbon::now(),

                ]);
                session()->flash('success', 'Notice Added successfully!');
                return back();


        }catch (\Exception $e) {
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
            $edits = $this->noticeRepository->findById($id);
            if ($edits->count() > 0) {
                $notices = $this->noticeRepository->all();
                return view('backend.notice.index', compact('edits', 'notices'));
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
    public function update(NoticeRequest $request, $id)
    {
        $id = (int)$id;
        $notice = $this->noticeRepository->findById($id);
        try {
            $old_file=$notice->notice_file;
            $old_banner=$notice->notice_banner;
            $notice_file=$request->file('notice_file');
            $notice_banner=$request->file('notice_banner');

            if ($notice_file){
                $name_gen=hexdec(uniqid());
                $file_ext=strtolower($notice_file->getClientOriginalExtension());
                $file_name=$name_gen. '.'.$file_ext;
                $up_location='image/notice/file/';
                $last_file=$up_location.$file_name;
                $notice_file->move($up_location,$file_name);
                unlink($old_file);

                $notice->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'notice_date' => $request->notice_date,
                    'notice_file' => $last_file,
                    'user_id' => Auth::user()->id,
                    'created_at'=>Carbon::now(),
                ]);
                session()->flash('success', 'Notice Updated successfully!');
                return redirect(route('notice.index'));
            }
            if($notice_banner){
                $name_gen=hexdec(uniqid());
                $banner_ext=strtolower($notice_banner->getClientOriginalExtension());
                $banner_name=$name_gen. '.'.$banner_ext;
                $up_location='image/notice/banner/';
                $last_banner=$up_location.$banner_name;
                $notice_banner->move($up_location,$banner_name);
                unlink($old_banner);

                $notice->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'notice_date' => $request->notice_date,
                    'notice_banner' => $last_banner,
                    'user_id' => Auth::user()->id,
                    'created_at'=>Carbon::now(),
                ]);
                session()->flash('success', 'Notice Updated successfully!');
                return redirect(route('notice.index'));
            }else{
                $notice->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'notice_date' => $request->notice_date,
                    'user_id' => Auth::user()->id,
                    'created_at'=>Carbon::now(),
                ]);
                session()->flash('success', 'Notice Updated successfully!');
                return redirect(route('notice.index'));
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
            $value = $this->noticeRepository->findById($id);
            if ($value) {

                if($value->notice_file){
                    $old_file=$value->notice_file;
                    unlink($old_file);
                }
               if ($value->notice_banner){
                   $old_banner=$value->notice_banner;
                   unlink($old_banner);
                 }

                $value->delete();
                session()->flash('error', 'Notice successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

    public function deleteCheckedNotice(Request $request){
        $ids=$request->ids;
        Notice::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Notice deleted sucessfully"]);
    }
}
