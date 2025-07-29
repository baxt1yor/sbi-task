<?php

namespace App\Services;

use App\Contracts\IProductService;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService implements IProductService
{

    public function getAll(): ProductCollection
    {
        // TODO: Implement getAll() method.
    }

    public function getById(Product $product): ProductResource
    {
        // TODO: Implement getById() method.
    }

    public function create(array $data): ProductResource
    {
        // TODO: Implement create() method.
    }

    public function update(Product $product, array $data): ProductResource
    {
        // TODO: Implement update() method.
    }

    public function delete(Product $product): void
    {
        // TODO: Implement delete() method.
    }
}
