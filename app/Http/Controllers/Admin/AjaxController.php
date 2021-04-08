<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function clearCache()
    {
        Cache::flush();
        return true;
    }

    public function updateStatusCategory(Request $request)
    {
        return $this->categoryRepo->updateStatus($request->id);
    }

    public function viewNewCategory()
    {
        $categories = $this->categoryRepo->getAll();

        return view('admin.ajax.new_category', [
            'categories' => $categories
        ]);
    }

    public function newCategory(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => __('Name category can not be blank'),
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => 1,
                'message' => $validator->errors()
            ]);
        }

        $category = $this->categoryRepo->handleStore($request->all());

        $category_parent_name = '';
        if ($request->input('category_id') != null) {
            $category_parent_name = $this->categoryRepo->find($request->input('category_id'))->name;
        }

        return response()->json([
            'error' => 0,
            'id' => $category->id,
            'category_name' => $category_parent_name,
        ]);
    }

    public function viewEditCategory($id)
    {
        $category = $this->categoryRepo->find($id);

        $list_category = $this->categoryRepo->getAll();

        return view('admin.ajax.edit_category', [
            'category' => $category,
            'list_category' => $list_category
        ]);
    }

    public function editCategory(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => __('Name category can not be blank'),
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => 1,
                'message' => $validator->errors()
            ]);
        }

        $this->categoryRepo->handleUpdate($request->only('id'), $request->except('id'));

        $category_parent_name = '';
        if ($request->input('category_id') != null) {
            $category_parent_name = $this->categoryRepo->find($request->input('category_id'))->name;
        }

        return response()->json([
            'error' => 0,
            'category_name' => $category_parent_name,
        ]);
    }
}