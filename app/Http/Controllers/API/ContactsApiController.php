<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Resources\Contact as ContactResource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ContactsApiController extends BaseController
{

    public function index()
    {
        $contacts = Contact::paginate(5);
        return $this->sendResponse(ContactResource::collection($contacts), 'Data retrieved Successfully');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $contact = Contact::create($input);

        return $this->sendResponse(new ContactResource($contact), 'Data uploaded successfully.');
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return $this->sendResponse(new ContactResource($contact), 'Data got');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();

        /*$validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }*/

        $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->update();
        return $this->sendResponse(new ContactResource($contact), 'Data updated successfully.');
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->delete()){
            return $this->sendResponse(new ContactResource($contact), 'Data deleted');
        }
    }
}
