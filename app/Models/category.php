<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class category extends Model
{
    protected $connection = "mongodb";
    protected $collection = "categories";

    protected $fillable = ['name','slug'];
    protected $timestamped = true;

}

