<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'price',
        'inventory',
        'category_id',
        'description',
        'images',
        'colors',
        'attribiutes',
        'productslug',
        'status'

    ];

    protected $casts  = [
         //'images' => 'array',
        // 'colors' => 'object',
        // 'category_id' => ObjectIdCast::class,

    ];




    public function category(){
        return $this->belongsTo(Category::class);
    }
}

