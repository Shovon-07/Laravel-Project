<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Email', 'Password', 'Mobile', 'Otp', 'Img'];
    protected $hidden = ['Otp'];
    protected $attributes = ['Mobile' => '', 'Otp' => 0, 'Img' => '/images/avater.png'];
}
