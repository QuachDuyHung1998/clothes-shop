<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * get all category level 1
     * @return mixin
     */
    public function getCategoryParent();

    /**
     * get all category children
     * @param $categoryParentId
     * @return arrayCategoryChildrenId
     */
    public function getAllCatetegoryChildren($categoryParentId);
}