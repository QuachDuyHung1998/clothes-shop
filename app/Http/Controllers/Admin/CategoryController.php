<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('category_id')->where('status', 1)->get();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }
}