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

    /**
     * update status
     * @param $categoryId
     * @return boolean
     */
    public function updateStatus($categoryId);

    /**
     * add category
     * @param $attributes (array)
     * @return mixin
     */
    public function handleStore($attributes);

    /**
     * add category
     * @param $categoryId
     * @param $attributes (array)
     * @return mixin
     */
    public function handleUpdate($categoryId, $attributes);
}