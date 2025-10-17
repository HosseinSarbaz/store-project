<?php
namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class paginationHelper
{
    public static function paginatecollection($items,$perpage = 15)
    {
        $collection = $items instanceof Collection ? $items : collect($items);

        $page = request()->input('page',1);

        $total= $items->count();

        $result = $items->forPage($page,$perpage)->values();

        return new LengthAwarePaginator(
            $result,
            $total,
            $perpage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );


    }
}


?>
