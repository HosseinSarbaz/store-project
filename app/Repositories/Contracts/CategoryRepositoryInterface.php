<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface{
    public function all();
    public function find($id);
    public function create(array $dataform);
    public function update($id,array $dataform);
    public function delete($id);
}


?>


