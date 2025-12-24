<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = "mongodb";
    protected $collection = "users";

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jalali(){
        return Jalalian::fromDateTime($this->created_at);
    }

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}
