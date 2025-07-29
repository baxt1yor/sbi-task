<?php

namespace App\Contracts;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

interface ICategoryService
{
    public function getAll(): CategoryCollection;

    public function getById(Category $category): CategoryResource;

    public function create(array $data): CategoryResource;

    public function update(Category $category, array $data): CategoryResource;

    public function delete(Category $category): void;
}
