<?php

namespace App\Http\Controllers;

use App\Repositories\ContactInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    protected $contactInterface;
    public function __construct(ContactInterface $contactInterface){
        $this->contactInterface = $contactInterface;
    }
    public function index()
    {
        //$contacts = Contact::paginate(5);
       $contacts = $this->contactInterface->all();
       //dd($contacts);
        //return view('pages.contacts.index', compact('contacts'));
        return view('pages.contacts.index', ['contacts' => $contacts]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'phone_number' => 'required',
        ]);
        //Contact::create($request->all());
        $this->contactInterface->store($request->all());
        return back()->with('success', 'Contact Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //$contact = Contact::find($id);
        $contact = $this->contactInterface->get($id);
        //dd($contact);
        return view('pages.contacts.edit', ['contact' => $contact]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        //Contact::find($id)->update($request->all());
        $this->contactInterface->update($id, $request->all());
        return redirect()->route('contact.index')->with('success', 'Contact updated Successfully');
    }


    public function destroy($id)
    {
        //Contact::find($id)->delete();
        $this->contactInterface->destroy($id);
        return back()->with('success', 'Contact deleted Successfully');
    }
}
