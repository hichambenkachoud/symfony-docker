<?php

namespace App\Services;

use App\Repository\CategoryRepository;

/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService
{
    /**
     * @param CategoryRepository $repository
     */
    public function getAllCategories(CategoryRepository  $repository) {

        return  $repository->getAll() ;
    }
}
