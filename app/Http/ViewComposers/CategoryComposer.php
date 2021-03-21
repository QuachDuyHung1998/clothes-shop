<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoryComposer
{
    public function __construct()
    {
        # code...
    }

    public function compose(View $view)
    {
        $categories = [];
        if (Cache::has('categories')) {
            $categories = Cache::get('categories');
        } else {
            $categories = Category::whereNull('category_id')->where('status', 1)->get();
            Cache::put('categories', $categories);
        }

        $view->with('categories', $categories);
    }
}