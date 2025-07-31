<?php

namespace App\Services;

use App\Contracts\IProductService;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;

class ProductService implements IProductService
{
    public function getAll(): ProductCollection
    {
        return new ProductCollection(Category::query()->paginate(20));
    }

    public function getById(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function create(array $data): ProductResource
    {
        return new ProductResource(Product::query()->create($data));
    }

    public function update(Product $product, array $data): ProductResource
    {
        $product->update($data);
        return new ProductResource($product);
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
