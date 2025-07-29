<?php

namespace App\Http\Controllers;

use App\Contracts\ICategoryService;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct(
        public readonly ICategoryService $categoryService
    ){}

    public function index()
    {
        return $this->categoryService->getAll();
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->categoryService->create($request->validated());
    }

    public function show(Category $category)
    {
        return $this->categoryService->getById($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return $this->categoryService->update($category, $request->validated());
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);
        return response()->noContent();
    }
}
