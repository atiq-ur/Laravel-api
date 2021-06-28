<?php
namespace App\Repositories;
interface ContactInterface {
    public function all();
    public function get($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}
