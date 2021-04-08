<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "category_id",
        "is_children",
        "status",
    ];

    public function categories()
    {
        return $this->hasMany(Category::class)->whereIn('status', [1, 2]);
        // return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories')->orderBy('id', 'DESC');
        // return $this->hasMany(Category::class, 'parent_id', 'id')->with('categories');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}