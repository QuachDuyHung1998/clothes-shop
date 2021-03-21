<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getCategoryParent()
    {
        return $this->model->whereNull('category_id')
            ->where('status', 1)
            ->get();
    }

    public function getAllCatetegoryChildren($categoryParentId)
    {
        $category_parent = $this->model->find($categoryParentId);

        $arr_children = [];
        $arr_children[] = $categoryParentId;

        $childrens = $category_parent->categories;
        foreach ($childrens as $child) {
            $arr_children[] = $child->id;
        }

        return $arr_children;
    }
}