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
}