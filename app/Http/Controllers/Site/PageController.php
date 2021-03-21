<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $categoryRepo;
    protected $productRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo, ProductRepositoryInterface $productRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    public function home()
    {
        return view('site.pages.home');
    }

    public function category(Category $category)
    {
        $arr_category_id = $this->categoryRepo->getAllCatetegoryChildren($category->id);
        $products = $this->productRepo->getProductFromArrCategory($arr_category_id);
        return $products;
        // return view('site.pages.category');
    }

    public function page(Menu $menu)
    {
        return $menu->name;
    }
}