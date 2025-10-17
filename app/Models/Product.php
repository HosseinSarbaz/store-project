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
        'status'

    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}

