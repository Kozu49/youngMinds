<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use App\Repository\SocialRepository;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Http\Requests\SocialRequestRequest;
use App\Repository\SocialRepositoryRepository;
use Illuminate\Support\Carbon;
class SocialController extends Controller
{
    /**
     * @var SocialRepository
     */
    private $socialRepository;

    public function __construct(SocialRepository $socialRepository)
    {

        $this->socialRepository = $socialRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = $this->socialRepository->all();
        return view('backend.social.index', compact('socials'));
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
    public function store(SocialRequest $request)
    {
        try {
            $create = Social::create($request->all());
            if ($create) {
                session()->flash('success', 'Social Media Info successfully created!');
                return back();
            } else {
                session()->flash('error', 'Pradesh could not be created!');
                return back();
            }
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
            $edits = $this->socialRepository->findById($id);
            if ($edits->count() > 0) {
                $socials = $this->socialRepository->all();
                return view('backend.social.index', compact('edits', 'socials'));
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
    public function update(SocialRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $social = $this->socialRepository->findById($id);
            if ($social) {
                $social->fill($request->all())->save();
                session()->flash('success', 'Social Media Info updated successfully!');

                return redirect(route('socialmedia.index'));
            } else {

                session()->flash('error', 'No record with given id!');
                return back();
            }
        } catch (\Exception $e) {
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
            $value = $this->socialRepository->findById($id);
            if ($value) {
                $valueId = $value->id;
                $result = Social::where('id', $valueId)->get();

                $value->delete();
                session()->flash('success', 'Social Info successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }
}
