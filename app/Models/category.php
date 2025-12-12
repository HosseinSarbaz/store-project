<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'category';

    protected $fillable = [
        'name',
        'image',
        'categoryslug',
        'icon',
        'icon_color',
        'status'
    ];

    public $timestamps = true;

    public function products(){
        return $this->hasMany(Product::class,'category_id','_id');
    }

}
