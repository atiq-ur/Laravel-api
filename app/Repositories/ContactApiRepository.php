<?php
namespace App\Repositories;
use App\Models\Contact;
use GuzzleHttp\Client;
use Illuminate\Http\JsonRespons;

class ContactApiRepository implements ContactInterface {
    protected $client;

    public function __construct(){
        $this->client = new Client();
    }

    public function all()
    {

        $client = new Client();
        $res = $client->request('GET', 'http://127.0.0.1:8001/api/contacts');
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        return json_decode($res->getBody()->getContents(), true);
        //return $res->getBody();
    }

    public function get($id)
    {
        //dd($id);
        $client = new Client();
        $res = $client->request('GET', 'http://127.0.0.1:8001/api/contacts/'.$id);
        //dd($res->getBody()->getContents());
        return json_decode($res->getBody()->getContents(), true);
    }

    public function store(array $data)
    {
        return $this->client->request('POST', 'http://127.0.0.1:8001/api/contacts',[
           'body' => json_encode($data),
            'headers'=> [
                'content-type' => 'application/json',
            ]
        ]);
    }

    public function update($id, array $data)
    {
        return $this->client->request('PUT', 'http://127.0.0.1:8001/api/contacts/'.$id,[
            'body' => json_encode($data),
            'headers'=> [
                'content-type' => 'application/json',
            ]
        ]);
    }

    public function destroy($id)
    {
        return $this->client->request('POST', 'http://127.0.0.1:8001/api/contacts/'.$id,[
            'form_params' => [
                '_method' => 'DELETE'
            ]
        ]);
    }
}
