<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadRequest;
use App\Repository\DownloadRepository;
use Illuminate\Http\Request;
use App\Models\Download;
use App\Http\Requests\DownloadRequestRequest;
use App\Repository\DownloadRepositoryRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    /**
     * @var DownloadRepository
     */
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepository)
    {

        $this->downloadRepository = $downloadRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = $this->downloadRepository->all();
        return view('backend.downloads.index', compact('downloads'));
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
    public function store(DownloadRequest $request)
    {
        try {
            $download_file=$request->file('file');
            $name_gen=hexdec(uniqid());
            $file_ext=strtolower($download_file->getClientOriginalExtension());
            $file_name=$name_gen. '.'.$file_ext;
            $up_location='image/download/';
            $last_file=$up_location.$file_name;
            $download_file->move($up_location,$file_name);
            Download::insert([
                'title'=>$request->title,
                'download_file'=>$last_file,
                'user_id'=>Auth::user()->id,
                'created_date'=>$request->created_date,

            ]);
            session()->flash('success', 'Download Added Sucessfully!');
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
            $edits = $this->downloadRepository->findById($id);
            if ($edits->count() > 0) {
                $downloads = $this->downloadRepository->all();
                return view('backend.downloads.index', compact('edits', 'downloads'));
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
    public function update(DownloadRequest $request, $id)
    {
        $id = (int)$id;
        $download = $this->downloadRepository->findById($id);
        try {
            $old_file=$download->download_file;
            $download_file=$request->file('file');
            if ($download_file){
                $name_gen=hexdec(uniqid());
                $file_ext=strtolower($download_file->getClientOriginalExtension());
                $file_name=$name_gen. '.'.$file_ext;
                $up_location='image/download/';
                $last_file=$up_location.$file_name;
                $download_file->move($up_location,$file_name);
                unlink($old_file);

                $download->update([
                    'title'=>$request->title,
                    'download_file'=>$last_file,
                    'user_id'=>Auth::user()->id,
                    'created_date'=>$request->created_date,

                ]);
                session()->flash('success', 'Downloads Updated successfully!');
                return redirect(route('download.index'));
            }else{
                $download->update([
                    'title'=>$request->title,
                    'user_id'=>Auth::user()->id,
                    'created_date'=>$request->created_date,

                ]);
                session()->flash('success', 'Download Updated successfully!');
                return redirect(route('download.index'));
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
            $value = $this->downloadRepository->findById($id);
            if ($value) {
                $old_file=$value->download_file;
                unlink($old_file);
                $valueId = $value->id;
                $value->delete();
                session()->flash('error', 'Download Content successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

}
