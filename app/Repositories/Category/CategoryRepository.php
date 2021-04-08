<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getCategoryParent()
    {
        return $this->model->whereNull('category_id')
            ->orderBy('id', 'DESC')
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

    public function updateStatus($categoryId)
    {
        $category = $this->model->find($categoryId);

        if (!$category) return false;

        $status = $category->status;
        $category->status = $status == 1 ? 0 : 1;
        $category->save();
        // delete cache in view composer
        Cache::forget('categories');

        return true;
    }

    public function handleStore($attributes = [])
    {
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        if (isset($attributes['category_id']) && $attributes['category_id'] != null) {
            $attributes['is_children'] = $this->find($attributes['category_id'])->id_children == 1 ? 1 : 0;
        } else {
            $attributes['is_children'] = 0;
        }
        $attributes['status'] = 1;

        return $this->create($attributes);
    }

    public function handleUpdate($categoryId, $attributes = [])
    {
        $attributes['slug'] = Str::slug($attributes['name'], '-');
        if (isset($attributes['category_id']) && $attributes['category_id'] != null) {
            $attributes['is_children'] = $this->find($attributes['category_id'])->id_children == 1 ? 1 : 0;
        } else {
            $attributes['is_children'] = 0;
        }

        return $this->update($categoryId, $attributes);
    }
}