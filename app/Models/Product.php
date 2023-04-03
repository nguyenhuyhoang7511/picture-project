<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
        'sale',
        'quantity',
        'description',
    ];

    protected $attributes = [
        'title' => 'string',
        'price' => 'integer',
        'sale' => 'integer',
        'quantity' => 'integer',
        'description' => 'string',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'product_id','id');
    }
}
