<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use MongoDB\BSON\ObjectId;


class ProductRepository implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function paginate(int $perpage=15): LengthAwarePaginator
    {
        return $this->model->with('category')->orderByDesc('_id')->paginate($perpage);
    }


    public function all()
    {
        return $this->model->with('category')->get();
    }

    public function find($id)
    {
        return $this->model->findOrfail($id);
    }

    public function create(array $dataform)
    {
        $dataform['category_id'] = new ObjectId($dataform['category_id']);
        return $this->model->create($dataform);
    }

    public function update($id, array $dataform)
    {
        $item = $this->find($id);
        $item->update($dataform);
        return $item;
    }

    public function delete($id)
    {
        $item=$this->find($id);
        if($item->images){
            Storage::disk('public')->delete('products/' . $item->images );
        }
        return $item->delete();
    }

}

?>
