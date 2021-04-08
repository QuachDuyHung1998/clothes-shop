<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->getCategoryParent();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        $product = $this->categoryRepo->find($category->id);

        return view('home.product', ['product' => $product]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->categoryRepo->create($data);

        return view('home.products');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->categoryRepo->update($id, $data);

        return view('home.products');
    }

    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect()->route('admin.category');
    }
}