<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "sku",
        "source_url",
        "name",
        "slug",
        "description",
        "detail",
        "image",
        "price",
        "price_discount",
        "category_id",
        "is_promotion",
        "status",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}