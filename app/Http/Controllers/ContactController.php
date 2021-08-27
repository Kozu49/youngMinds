<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repository\ContactRepository;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequestRequest;
use App\Repository\ContactRepositoryRepository;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{

    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {

        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->all();
        return view('backend.contact.index', compact('contacts'));
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
    public function store(ContactRequest $request)
    {
        try {
            $create = Contact::create($request->all());
            if ($create) {
                session()->flash('success', 'Contact successfully created!');
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
            $edits = $this->contactRepository->findById($id);
            if ($edits->count() > 0) {
                $contacts = $this->contactRepository->all();
                return view('backend.contact.index', compact('edits', 'contacts'));
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
    public function update(ContactRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $contact = $this->contactRepository->findById($id);
            if ($contact) {
                $contact->fill($request->all())->save();
                session()->flash('success', 'Contact updated successfully!');

                return redirect(route('contact.index'));
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
            $value = $this->contactRepository->findById($id);
            if ($value) {
                $valueId = $value->id;
                $result = Contact::where('id', $valueId)->get();

                $value->delete();
                session()->flash('success', 'Contact Info successfully deleted!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }
}
