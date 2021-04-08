<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAll();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $list_category = $this->categoryRepo->getAll();
        return view('admin.product.create', [
            'list_category' => $list_category
        ]);
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);
        return redirect()->route('admin.product');
    }
}