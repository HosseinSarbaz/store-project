<?php

namespace App\Repositories\Eloquent;

use App\Helpers\paginationHelper;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAllWithProductCount($perpage = 15)
    {
        $categories = Category::raw(function($collection){
            return $collection->aggregate(
                [
                    ['$lookup' => [
                        'from' => 'products',
                        'localField' => '_id',
                        'foreignField' => 'category_id',
                        'as' => 'products'
                    ]],
                    [
                        '$addFields' => [
                            'products_Count' => ['$size'=> '$products' ]
                        ]
                    ],
                        [
                            '$sort' => ['_id' => -1]
                        ],

                    [
                        '$project' => [
                            'products' => 0
                        ]
                    ]

                    ]);
        });

        $categories = collect($categories);

        return paginationHelper::paginatecollection($categories,$perpage);
    }

    public function all($perpage = 15)
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrfail($id);
    }

    public function create(array $dataform)
    {
        return $this->model->create($dataform);
    }

    public function update($id, array $dataform)
    {
        $item = $this->find($id);
        return $item->update($dataform);

    }

    public function delete($id)
    {
        $item = $this->find($id);

        if($item->image){
        Storage::disk('public')->delete('categories/'. $item->image );
        }

        return $item->delete();

    }
}


// $categories = Category::raw(function ($collection) {
//     return $collection->aggregate([
//         [
//             '$lookup' => [
//                 'from' => 'products', // نام collection محصولات
//                 'localField' => '_id', // فیلد در دسته‌بندی‌ها
//                 'foreignField' => 'category_id', // فیلد در محصولات
//                 'as' => 'products'
//             ]
//         ],
//         [
//             '$addFields' => [
//                 'products_count' => ['$size' => '$products']
//             ]
//         ],
//         [
//             '$sort' => ['_id' => -1]
//         ],
//         [
//             '$project' => [
//                 'products' => 0 // خود آرایه محصولات رو حذف کن، فقط count نگه دار
//             ]
//         ]
//     ]);
// });

?>
