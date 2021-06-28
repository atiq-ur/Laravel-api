<?php
namespace App\Repositories;
use App\Models\Contact;

class ContactRepository implements ContactInterface {

    public function all()
    {
        return Contact::paginate(5);
    }

    public function get($id)
    {
        return Contact::find($id);
    }

    public function store(array $data)
    {
        return Contact::create($data);
    }

    public function update($id, array $data)
    {
        return Contact::find($id)->update($data);
    }

    public function destroy($id)
    {
        return Contact::destroy($id);
    }
}
