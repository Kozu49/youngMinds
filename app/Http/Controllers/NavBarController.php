<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavBar;
use App\Http\Requests\NavBarRequest;
use App\Repository\NavBarRepository;
class NavBarController extends Controller
{
    /**
     * @var NavBarRepository
     */
    private $navbarRepository;

    public function __construct(NavBarRepository $navbarRepository)
    {

        $this->navbarRepository = $navbarRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbars = $this->navbarRepository->all();
        return view('backend.navbar.index', compact('navbars'));
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
    public function store(NavBarRequest $request)
    {

        try {
//        $create = NavBar::create($request->all());
//        if ($create) {
//            session()->flash('success', 'NavBar Title successfully created!');
//            return back();
//        } else {
//            session()->flash('error', 'Event could not be created!');
//            return back();
//        }
            NavBar::insert([
                'navbar'=>$request->navbar,
                'url'=>'/'.$this->createUrl($request->url),

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
            $edits = $this->navbarRepository->findById($id);
            if ($edits->count() > 0) {
                $navbars = $this->navbarRepository->all();
                return view('backend.navbar.index', compact('edits', 'navbars'));
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
    public function update(NavBarRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $navbar= $this->navbarRepository->findById($id);
            if ($navbar) {
                $navbar->fill($request->all())->save();
                session()->flash('success', 'NavBar Title updated successfully!');

                return redirect(route('navbar.index'));
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
            $value = $this->navbarRepository->findById($id);
            if ($value) {
                $valueId = $value->id;
                $value->delete();
                session()->flash('error', 'NavBar Title successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }

    public function createUrl($url){
        $allUrl = $this->getRelatedUrls($url);
        if (! $allUrl->contains('url', $url)){
            return $url;
        }
        else{
            return false;
        }
}

public function getRelatedUrls($url){
    return NavBar::select('url')->where('url', 'like', $url)
        ->get();


}


}
