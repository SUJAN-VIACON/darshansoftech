<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'image'
    ];

    protected $casts = [
        'phone' => 'string',
    ];

    // * helpers method

    public function toString()
    {
        return "\n 
        First Name: $this->first_name \n
        Last Name: $this->first_name \n
        Email: $this->email \n
        Phone: $this->phone \n
        Image: $this->image ";
    }
}
