<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
     * get all product from array category id
     * @param $arrCategoryId
     * @return mixin
     */
    public function getProductFromArrCategory($arrCategoryId);

    /**
     * get all product with paginate = 20
     * @return mixin
     */
    public function getAll();
}