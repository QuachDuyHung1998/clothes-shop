<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getProductFromArrCategory($arrCategoryId = [])
    {
        return $this->model->whereIn('category_id', $arrCategoryId)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'desc')->paginate(15);
    }
}