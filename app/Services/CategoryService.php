<?php

namespace App\Services;

use App\Contracts\ICategoryService;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService implements ICategoryService
{
    public function getAll(): CategoryCollection
    {
        return new CategoryCollection(Category::query()->paginate(20));
    }

    public function getById(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function create(array $data): CategoryResource
    {
       return new CategoryResource(Category::query()->create($data));
    }

    public function update(Category $category, array $data): CategoryResource
    {
        $category->update($data);
        return new CategoryResource($category);
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
