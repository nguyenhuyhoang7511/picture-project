<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $attributes = [
        'title' => 'string',
        'price' => 'integer',
        'sale' => 'integer',
        'quantity' => 'integer',
        'description' => 'string',
        'image_id	' => 'string',
    ];
}
