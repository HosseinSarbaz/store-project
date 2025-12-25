<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class address extends Model
{
    protected $connection = "mongodb";
    protected $collection = "address";


    protected $fillable = [
        'user_id',
        'city',
        'postal_code',
        'address'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','_id');
    }
}
