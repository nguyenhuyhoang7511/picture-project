<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'coin',
        'status',
        'avatar',
    ];

    protected $attributes = [
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'coin' => 'integer',
        'status' => 'number',
        'avatar' => 'string',
    ];
}
